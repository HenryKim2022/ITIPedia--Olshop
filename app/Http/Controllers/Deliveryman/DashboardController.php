<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    # dashboard
    public function index(Request $request)
    { 

        $data['out_for_delivery'] = Order::where('deliveryman_id', auth()->id())->where('delivery_status','out_for_delivery')->count();

        $data['delivered'] = Order::where('deliveryman_id', auth()->id())->where('delivery_status','delivered')->count();

        $data['cancelled'] = Order::where('deliveryman_id', auth()->id())->where('delivery_status','cancelled')->count();

        $data['picked'] = Order::where('deliveryman_id', auth()->id())->where('delivery_status','picked_up')->count();

        $data['assigned'] = Order::where('deliveryman_id', auth()->id())->where('delivery_status','order_placed')->count();
        
        return view('deliveryman.dashboard')->with($data);
    }

    # profile
    public function profile()
    {
        $user = auth()->user();
        return view('backend.pages.profile', compact('user'));
    }

    # profile update
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->phone = validatePhone($request->phone);
        $user->avatar = $request->avatar;

        if ($request->has('password') && $request->password != '') {
            if ($request->password != $request->password_confirmation) {
                flash(localize('Password confirmation does not match'))->error();
                return back();
            }
            $user->password = Hash::make($request->password);
        } 

        $user->save(); 
        flash(localize('Profile has been updated'))->success();
        return back();
    }
    
}
