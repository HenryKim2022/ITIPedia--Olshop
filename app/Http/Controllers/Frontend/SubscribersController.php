<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\SubscribedUser;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    # store new subscribers
    public function store(Request $request)
    {
        $score = recaptchaValidation($request);  
        $request->request->add([
            'score' => $score
        ]);
        $data['score'] = 'required|numeric|min:0.9';  
        $request->validate($data,[
            'score.min' => localize('Google recaptcha validation error, seems like you are not a human.')
        ]);

        $subscriber = SubscribedUser::where('email', $request->email)->first();
        if($subscriber == null){
            $subscriber = new SubscribedUser;
            $subscriber->email = $request->email;
            $subscriber->save();
            flash(localize('You have subscribed successfully'))->success();
        }
        else{
            flash(localize('You are  already a subscriber'))->error();
        }
        return back();
    }
}
