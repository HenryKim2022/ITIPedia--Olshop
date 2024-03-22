<?php

namespace App\Http\Controllers\Backend\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawRequestsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $paymentHistories = AffiliatePayment::where('status', 'requested');
        if ($user->user_type == "customer") {
            $paymentHistories = $paymentHistories->where('user_id', $user->id)->latest();
        } else {
            if (!auth()->user()->can('affiliate_withdraw')) {
                abort(403);
            }
            $paymentHistories = $paymentHistories->latest();
        }
        $paymentHistories = $paymentHistories->paginate(paginationNumber());
        return view('backend.pages.affiliate.withdrawRequests', compact('paymentHistories'));
    }

    public function store(Request $request)
    {
        $paymentAccount = AffiliatePayoutAccount::find((int)$request->payout_account_id);
        $user = auth()->user();
        if (is_null($paymentAccount)) {
            abort(404);
        }

        if (priceToUsd($request->amount) < getSetting('minimum_withdrawal_amount')) {
            flash(localize('Your payout amount can not be less than the minimum withdrawal amount'))->error();
            return back();
        }

        if (priceToUsd($request->amount) > $user->user_balance) {
            flash(localize('Your balance is lower than withdrawal amount'))->error();
            return back();
        }

        $withdrawRequest                    = new AffiliatePayment;
        $withdrawRequest->user_id           = $user->id;
        $withdrawRequest->amount            = priceToUsd($request->amount);
        $withdrawRequest->payment_method    = $paymentAccount->payment_method;
        $withdrawRequest->additional_info   = $paymentAccount->additional_info;
        $withdrawRequest->save();

        $user->user_balance -= priceToUsd($request->amount);
        $user->save();
        flash(localize('Your payout request has been submitted'))->success();
        return back();
    }

    public function update(Request $request)
    {
        $history = AffiliatePayment::find((int) $request->id);
        $user = User::where('id', $history->user_id)->first();
        if ($request->status == "cancelled") {
            $user->user_balance += $history->amount;
            $user->save();
        }
        $history->status = $request->status;
        $history->remarks = $request->remarks;
        $history->save();
        flash(localize('Status has been updated successfully'))->success();
        return back();
    }
}
