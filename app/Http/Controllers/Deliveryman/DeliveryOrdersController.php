<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Backend\Orders\OrdersController;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderGroup;
use App\Models\OrderUpdate;
use App\Models\Payout;
use App\Models\User;
use App\Models\WalletHistory;
use App\Notifications\DeliverymanOrderCancelNotification;
use App\Notifications\DeliverymanOrderStatusChangeNotification;
use App\Notifications\PayoutRequestNotification;
use Illuminate\Http\Request;

class DeliveryOrdersController extends Controller
{
    # assigned
    public function assigned(Request $request)
    {
        $searchKey = null;
        $searchCode = null;
        $paymentStatus = null;  
        $user = auth()->user();

        $orders = Order::where('deliveryman_id', $user->id)->latest();

        $orders = $orders->where(function ($q) { 
            $q->where('delivery_status', "order_placed")->orWhere('delivery_status', "pending")->orWhere('delivery_status', "processing");
        });

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

        if ($request->payment_status != null) {
            $paymentStatus = $request->payment_status;
            $orders = $orders->where('payment_status', $paymentStatus);
        }

        $orders = $orders->paginate(paginationNumber());
        $locations = Location::where('is_published', 1)->latest()->get();
        return view('deliveryman.assigned', compact('orders', 'searchKey', 'searchCode', 'paymentStatus')); 
    } 

     # pickedUp
     public function pickedUp(Request $request)
     {
         $searchKey = null;
         $searchCode = null;
         $paymentStatus = null;  
         $user = auth()->user();
 
         $orders = Order::where('deliveryman_id', $user->id)->latest();
 
         $orders = $orders->where(function ($q) { 
             $q->where('delivery_status', "picked_up");
         });
 
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
 
         if ($request->payment_status != null) {
             $paymentStatus = $request->payment_status;
             $orders = $orders->where('payment_status', $paymentStatus);
         }
 
         $orders = $orders->paginate(paginationNumber());
         $locations = Location::where('is_published', 1)->latest()->get();
         return view('deliveryman.pickedUp', compact('orders', 'searchKey', 'searchCode', 'paymentStatus')); 
     } 

     # outForDelivery
     public function outForDelivery(Request $request)
     {
         $searchKey = null;
         $searchCode = null;
         $paymentStatus = null;  
         $user = auth()->user();
 
         $orders = Order::where('deliveryman_id', $user->id)->latest();
 
         $orders = $orders->where(function ($q) { 
             $q->where('delivery_status', "out_for_delivery");
         });
 
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
 
         if ($request->payment_status != null) {
             $paymentStatus = $request->payment_status;
             $orders = $orders->where('payment_status', $paymentStatus);
         }
 
         $orders = $orders->paginate(paginationNumber());
         $locations = Location::where('is_published', 1)->latest()->get();
         return view('deliveryman.outForDelivery', compact('orders', 'searchKey', 'searchCode', 'paymentStatus')); 
     } 

     # delivered
     public function delivered(Request $request)
     {
         $searchKey = null;
         $searchCode = null;
         $paymentStatus = null;  
         $user = auth()->user();
 
         $orders = Order::where('deliveryman_id', $user->id)->latest();
 
         $orders = $orders->where(function ($q) { 
             $q->where('delivery_status', "delivered");
         });
 
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
 
         if ($request->payment_status != null) {
             $paymentStatus = $request->payment_status;
             $orders = $orders->where('payment_status', $paymentStatus);
         }
 
         $orders = $orders->paginate(paginationNumber());
         $locations = Location::where('is_published', 1)->latest()->get();
         return view('deliveryman.delivered', compact('orders', 'searchKey', 'searchCode', 'paymentStatus')); 
     } 

     # cancelled
     public function cancelled(Request $request)
     {
         $searchKey = null;
         $searchCode = null;
         $paymentStatus = null;  
         $user = auth()->user();
 
         $orders = Order::where('deliveryman_id', $user->id)->latest();
 
         $orders = $orders->where(function ($q) { 
             $q->where('delivery_status', "cancelled");
         });
 
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
 
         if ($request->payment_status != null) {
             $paymentStatus = $request->payment_status;
             $orders = $orders->where('payment_status', $paymentStatus);
         }
 
         $orders = $orders->paginate(paginationNumber());
         $locations = Location::where('is_published', 1)->latest()->get();
         return view('deliveryman.cancelled', compact('orders', 'searchKey', 'searchCode', 'paymentStatus')); 
     } 

     
    # update delivery status
    public function updateDeliveryStatus(Request $request)
    {
        $order = Order::findOrFail((int)$request->order_id); 

        if ($order->delivery_status != orderCancelledStatus() && $request->status == orderCancelledStatus()) {
            $ordersController = new OrdersController;
            $ordersController->addQtyToStock($order);
        }

        if ($order->delivery_status == orderCancelledStatus() && $request->status != orderCancelledStatus()) {
            $ordersController->removeQtyFromStock($order);
        }

        $order->delivery_status = $request->status;
        
        $note =  'Delivery status updated to ' . ucwords(str_replace('_', ' ', $request->status)).'.';
        if($order->delivery_status == "delivered"){
            $order->payment_status = "paid";
            $note =  'Delivery status updated to ' . ucwords(str_replace('_', ' ', $request->status)) . ' & payment status updated to paid.';

            $paymentType = getSetting('delivery_boy_payment_type');

            if('commission' == $paymentType){

                $amount = getSetting('delivery_boy_commission') + $order->tips_amount;

                $user = auth()->user();

                $user->user_balance += $amount;
                
                $user->save();

                $wallet = new WalletHistory();
                $wallet->user_id = auth()->id();
                $wallet->amount = $amount;
                $wallet->payment_method = "Delivery Commission";
                $wallet->save();

            }
        }

        $order->save(); 
        
        OrderUpdate::create([
            'order_id' => $order->id,
            'user_id' => auth()->user()->id,
            'note' => $note,
        ]);  



        $admin = User::where('user_type','admin')->first();
        

        if($admin){

            $admin->notify(new DeliverymanOrderStatusChangeNotification($order));
        }
        



        return true;
    }

    # show order details
    public function show($id)
    {
        $order = Order::find($id);
        return view('deliveryman.show', compact('order'));
    }


    function cancelOrder(Request $request, Order $order){
        

        $request->validate(['reason' => 'required']);


        $order->delivery_status = 'cancelled';

        $order->note = $request->reason;

        $order->save();


        $user = User::where('user_type','admin')->first();
        
        
        $user->notify(new DeliverymanOrderCancelNotification());


        flash(localize('You are canceled a order'))->success();

        return redirect()->route('deliveryman.cancelled');


    }

    function earningHistory(){

        $data['wallets'] = WalletHistory::where('user_id',auth()->id())->paginate(paginationNumber());

        return view('deliveryman.earnings')->with($data);
    }

    function payoutHistory(){

        $data['payouts'] = Payout::where('user_id', auth()->id())->latest()->paginate(paginationNumber());

        return view('deliveryman.payout')->with($data);
    }

    function payoutRequest(Request $request){
        
        $request->validate([
            'payout' => 'required|numeric|gt:0|lte:'.auth()->user()->user_balance,
            'instruction' => 'required'
        ],[
            'payout.lte' =>'Insufficient Balance for payout'
        ]);


        $payout = Payout::create([
            'user_id' => auth()->id(),
            'amount' => $request->payout,
            'instruction' => $request->instruction,
            'status' => 'pending'
        ]);


        $user = auth()->user();

        $user->user_balance -= $request->payout;

        $user->save();

        $admin = User::where('user_type','admin')->first();

        if($admin){
            $admin->notify(new PayoutRequestNotification($payout));
        }
        flash(localize('Your Payout request is under processing'))->success();

        return back();


    }
}