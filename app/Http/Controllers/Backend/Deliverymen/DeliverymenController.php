<?php

namespace App\Http\Controllers\Backend\Deliverymen;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderGroup;
use App\Models\Payout;
use App\Models\Payroll;
use App\Models\SystemSetting;
use App\Models\User;
use App\Notifications\DeliverymanPayoutStatusNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliverymenController extends Controller
{
    # list
    public function index(Request $request)
    {
        $searchKey = null;
        $deliverymen = User::latest();
        if ($request->search != null) {
            $deliverymen = $deliverymen->where(function ($query) use ($request) {
                $query->orWhere('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
            $searchKey = $request->search;
        }
        $deliverymen = $deliverymen->where('user_type', 'deliveryman')->where('id', '!=', auth()->user()->id)->paginate(paginationNumber());
        return view('backend.pages.deliverymen.index', compact('deliverymen', 'searchKey'));
    }

    # create
    public function create()
    {
        return view('backend.pages.deliverymen.create');
    }

    # store in db
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'salary' => 'nullable|gt:0',
            'address' => 'required',
            'password' => 'required'
        ]);


        $user               = new User;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->avatar       = $request->image;
        $user->address      = $request->address;
        $user->salary      = $request->salary;
        $user->shop_id      = auth()->user()->shop_id ?? 1;
        $user->location_id  = $request->location_id;
        $user->phone        = validatePhone($request->phone);
        $user->user_type    = "deliveryman";
        $user->password     = Hash::make($request->password);
        $user->created_by   = auth()->user()->id;
        $user->save();

        flash(localize('Deliveryman has been added successfully'))->success();
        return redirect()->route('admin.deliverymen.index');
    }

    # edit page
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        return view('backend.pages.deliverymen.edit', compact('user'));
    }

    # update
    public function update(Request $request, $id)
    {


        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'salary' => 'nullable|gt:0',
            'address' => 'required'
        ]);

        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->salary      = $request->salary;
        $user->avatar       = $request->image;
        $user->address      = $request->address;
        $user->location_id  = $request->location_id;
        $user->phone      = validatePhone($request->phone);
        if (strlen($request->password) > 0) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        flash(localize('Deliveryman has been updated successfully'))->success();
        return redirect()->route('admin.deliverymen.index');
    }

    # delete
    public function delete($id)
    {
        User::where('id', $id)->delete();
        flash(localize('Deliveryman has been deleted successfully'))->success();
        return redirect()->route('admin.deliverymen.index');
    }

    function configuration()
    {
        return view('backend.pages.deliverymen.configuration');
    }

    function configurationUpdate(Request $request)
    {

        SystemSetting::updateOrCreate(['entity' => 'delivery_boy_payment_type'], ['value' => $request->delivery_boy_payment_type]);
        SystemSetting::updateOrCreate(['entity' => 'delivery_boy_commission'], ['value' => $request->delivery_boy_commission]);
        SystemSetting::updateOrCreate(['entity' => 'delivery_boy_send_mail'], ['value' => $request->delivery_boy_send_mail == 'on' ? true : false]);
        SystemSetting::updateOrCreate(['entity' => 'delivery_boy_send_otp'], ['value' => $request->delivery_boy_send_otp == 'on' ? true : false]);

        cacheClear();

        flash(localize('Deliveryman Configuration has been updated successfully'))->success();
        return redirect()->route('admin.deliveryman.config');
    }

    function cancelRequest(Request $request)
    {
        $searchKey = null;
        $searchCode = null;
        $deliveryStatus = null;
        $paymentStatus = null;
        $locationId = null;
        $posOrder = 0;

        $orders = Order::where('delivery_status', 'cancelled')->latest();

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

    function payoutHistory(Request $request){

        $data['payouts'] = Payout::when($request->search, function($item) use($request){
            $user = User::where('name', 'LIKE', "%$request->search%")->pluck('id');
            $item->whereIn('user_id',$user);
        })->when($request->payout_status, function($item) use($request){
            $item->where('status', $request->payout_status);
        })->with('deliveryman')->latest()->paginate(paginationNumber());

        return view('backend.pages.deliverymen.payouts')->with($data);
    }

    function acceptPayout(Payout $payout){

        $payout->status = 'accepted';

        $payout->save();

        $payout->deliveryman->notify(new DeliverymanPayoutStatusNotification($payout));

        flash(localize('Payout request accepted successfully'))->success();

        return back();

    }

    function rejectPayout(Request $request, Payout $payout){

        $request->validate(['note' => 'required']);

        $payout->status = 'rejected';

        $payout->note = $request->note;

        $payout->save();

        $user = $payout->deliveryman;

        $user->user_balance += $payout->amount;

        $user->save();

        $payout->deliveryman->notify(new DeliverymanPayoutStatusNotification($payout));

        flash(localize('Payout request rejected successfully'))->success();

        return back();
    }

    function payroll(){

        $data['users'] = User::select('name','id')->where('user_type','deliveryman')->latest()->get();

        return view('backend.pages.deliverymen.salary')->with($data);
    }

    function getSalary(Request $request){

        $user = User::find($request->deliveryman);

        $month = $request->month;

        return ['user' => $user,'month' => $month];

    }

    function payrollList(){

        $data['payrolls'] = Payroll::latest()->with('user')->paginate(paginationNumber());

        return view('backend.pages.deliverymen.salary_list')->with($data);
    }

    function payrollStore(Request $request){
        $request->validate([
            'deliveryman_id' => 'required'
        ]);



        Payroll::create([
            'user_id' => $request->deliveryman_id,
            'month' => $request->month,
            'basic_salary' => $request->basic_sal,
            'status' => $request->status,
            'bonus' => $request->bonus,
            'deduct' =>$request->deduct,
            'total_allownce' => $request->total_al,
            'total_deduction' => $request->total_de,
            'total_salary'=>$request->net_sal
        ]);

        flash(localize('Payroll Created successfully'))->success();

        return back();
    }

    function payrollChangeStatus(Request $request){
        $payroll = Payroll::findOrFail($request->id);
        $payroll->status = $request->status;
        if ($payroll->save()) {
            return 1;
        }
        return 0;
    }

    function payrollEdit(Payroll $payroll){
        return view('backend.pages.deliverymen.edit_payroll',[
            'users' => User::select('name','id')->where('user_type','deliveryman')->latest()->get(),
            'payroll' => $payroll,
            'deliveryman' => $payroll->user
        ]);
    }

    function payrollUpdate(Request $request, Payroll $payroll){
       
        $request->validate([
            'deliveryman_id' => 'required'
        ]);


        $payroll->update([
            'user_id' => $request->deliveryman_id,
            'month' => $request->month,
            'basic_salary' => $request->basic_sal,
            'status' => $request->status,
            'bonus' => $request->bonus,
            'deduct' =>$request->deduct,
            'total_allownce' => $request->total_al,
            'total_deduction' => $request->total_de,
            'total_salary'=>$request->net_sal
        ]);

        flash(localize('Payroll Updated successfully'))->success();

        return back();
    }
}
