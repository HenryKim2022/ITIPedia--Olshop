<?php

namespace App\Http\Controllers\Backend\Orders;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderGroup;
use App\Models\OrderItem;
use App\Models\OrderUpdate;
use App\Models\User;
use App\Notifications\DeliverymanAssignNotification;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class OrdersController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:orders'])->only('index');
        $this->middleware(['permission:manage_orders'])->only(['show', 'updatePaymentStatus', 'updateDeliveryStatus']);
    }

    # get all orders
    public function index(Request $request)
    {
        $searchKey = null;
        $searchCode = null;
        $deliveryStatus = null;
        $paymentStatus = null;
        $locationId = null;
        $posOrder = 0;

        $orders = Order::latest();

        # conditional 
        if ($request->search != null) {
            $searchKey = $request->search;
            $orders = $orders->where(function ($q) use ($searchKey) {
                $customers = User::where('name', 'like', '%' . $searchKey . '%')
                    ->orWhere('phone', 'like', '%' . $searchKey)
                    ->pluck('id');
                $q->orWhereIn('user_id', $customers);
            });
        }

        if ($request->code != null) {
            $searchCode = $request->code;
            $orders = $orders->where(function ($q) use ($searchCode) {
                $orderGroup = OrderGroup::where('order_code', $searchCode)->pluck('id');
                $q->orWhereIn('order_group_id', $orderGroup);
            });
        }

        if ($request->delivery_status != null) {
            $deliveryStatus = $request->delivery_status;
            $orders = $orders->where('delivery_status', $deliveryStatus);
        }

        if ($request->payment_status != null) {
            $paymentStatus = $request->payment_status;
            $orders = $orders->where('payment_status', $paymentStatus);
        }

        if ($request->location_id != null) {
            $locationId = $request->location_id;
            $orders = $orders->where('location_id', $locationId);
        }


        if ($request->is_pos_order != null) {
            $posOrder = $request->is_pos_order;
        }

        $orders = $orders->where(function ($q) use ($posOrder) {
            $orderGroup = OrderGroup::where('is_pos_order', $posOrder)->pluck('id');
            $q->orWhereIn('order_group_id', $orderGroup);
        });

        $orders = $orders->paginate(paginationNumber());
        $locations = Location::where('is_published', 1)->latest()->get();
        return view('backend.pages.orders.index', compact('orders', 'searchKey', 'locations', 'locationId', 'searchCode', 'deliveryStatus', 'paymentStatus', 'posOrder'));
    }

    # show order details
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $deliverymen = User::where('is_active', 1)->where('user_type', 'deliveryman')->where('location_id', $order->orderGroup->location_id)->latest()->get();
        return view('backend.pages.orders.show', compact('order', 'deliverymen'));
    }

    # assign deliveryman
    public function assignDeliveryman(Request $request)
    {
        $order = Order::findOrFail((int)$request->order_id);
        $order->deliveryman_id = $request->deliveryman_id ?? null;
        $order->save();

        $deliveryman = User::whereId($order->deliveryman_id)->first();

        OrderUpdate::create([
            'order_id' => $order->id,
            'user_id' => auth()->user()->id,
            'note' =>  $deliveryman != null ? $deliveryman->name . ' has been assigned for delivery.' : 'Deliveryman has been removed.',
        ]);

        $deliveryman->notify(new DeliverymanAssignNotification($order));

        return true;
    }
    # update payment status 
    public function updatePaymentStatus(Request $request)
    {
        $order = Order::findOrFail((int)$request->order_id);
        $order->payment_status = $request->status;
        $order->save();

        OrderUpdate::create([
            'order_id' => $order->id,
            'user_id' => auth()->user()->id,
            'note' => 'Payment status updated to ' . ucwords(str_replace('_', ' ', $request->status)) . '.',
        ]);

        // todo::['mail notification']
        return true;
    }

    # update delivery status
    public function updateDeliveryStatus(Request $request)
    {
        $order = Order::findOrFail((int)$request->order_id);

        if ($order->delivery_status != orderCancelledStatus() && $request->status == orderCancelledStatus()) {
            $this->addQtyToStock($order);
        }

        if ($order->delivery_status == orderCancelledStatus() && $request->status != orderCancelledStatus()) {
            $this->removeQtyFromStock($order);
        }

        $order->delivery_status = $request->status;
        $order->save();

        OrderUpdate::create([
            'order_id' => $order->id,
            'user_id' => auth()->user()->id,
            'note' => 'Delivery status updated to ' . ucwords(str_replace('_', ' ', $request->status)) . '.',
        ]);

        // todo::['mail notification'] 
        return true;
    }

    # add qty to stock 
    private function addQtyToStock($order)
    {
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        foreach ($orderItems as $orderItem) {
            $stock = $orderItem->product_variation->product_variation_stock;
            $stock->stock_qty += $orderItem->qty;
            $stock->save();

            $product = $orderItem->product_variation->product;
            $product->total_sale_count += $orderItem->qty;
            $product->save();

            if ($product->categories()->count() > 0) {
                foreach ($product->categories as $category) {
                    $category->total_sale_count += $orderItem->qty;
                    $category->save();
                }
            }
        }
    }

    # remove qty from stock  
    private function removeQtyFromStock($order)
    {
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        foreach ($orderItems as $orderItem) {
            $stock = $orderItem->product_variation->product_variation_stock;
            $stock->stock_qty -= $orderItem->qty;
            $stock->save();

            $product = $orderItem->product_variation->product;
            $product->total_sale_count -= $orderItem->qty;
            $product->save();

            if ($product->categories()->count() > 0) {
                foreach ($product->categories as $category) {
                    $category->total_sale_count -= $orderItem->qty;
                    $category->save();
                }
            }
        }
    }

    # download invoice
    public function downloadInvoice($id)
    {
        if (session()->has('locale')) {
            $language_code = session()->get('locale', Config::get('app.locale'));
        } else {
            $language_code = env('DEFAULT_LANGUAGE');
        }

        if (session()->has('currency_code')) {
            $currency_code = session()->get('currency_code', Config::get('app.currency_code'));
        } else {
            $currency_code = env('DEFAULT_CURRENCY');
        }

        if (Language::where('code', $language_code)->first()->is_rtl == 1) {
            $direction = 'rtl';
            $default_text_align = 'right';
            $reverse_text_align = 'left';
        } else {
            $direction = 'ltr';
            $default_text_align = 'left';
            $reverse_text_align = 'right';
        }

        $currency_code = env('INVOICE_LANG');

        $font_family = env('INVOICE_FONT');

        if ($currency_code == 'BDT' || $currency_code == 'bdt' || $language_code == 'bd' || $language_code == 'bn') {
            # bengali font
            $font_family = "'Hind Siliguri','sans-serif'";
        } elseif ($currency_code == 'KHR' || $language_code == 'kh') {
            # khmer font
            $font_family = "'Khmeros','sans-serif'";
        } elseif ($currency_code == 'AMD') {
            # Armenia font
            $font_family = "'arnamu','sans-serif'";
        } elseif ($currency_code == 'AED' || $currency_code == 'EGP' || $language_code == 'sa' || $currency_code == 'IQD' || $language_code == 'ir') {
            # middle east/arabic font
            $font_family = "'XBRiyaz','sans-serif'";
        } else {
            # general for all
            $font_family = "'Roboto','sans-serif'";
        }

        $order = Order::findOrFail((int)$id);
 
        return PDF::loadView('backend.pages.orders.invoice', [
            'order' => $order,
            'font_family' => $font_family,
            'direction' => $direction,
            'default_text_align' => $default_text_align,
            'reverse_text_align' => $reverse_text_align
        ], [], [])->download(getSetting('order_code_prefix') . $order->orderGroup->order_code . '.pdf');


    }
}
