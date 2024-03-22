<?php

namespace Modules\PaymentGateway\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Support\Renderable;
use Modules\PaymentGateway\Entities\PaymentGateway;
use Modules\PaymentGateway\Entities\PaymentGatewayDetail;
use Modules\PaymentGateway\Http\Services\PaymentGatewayService;
use Modules\PaymentGateway\Http\Requests\PaymentGatewayRequestForm;

class PaymentGatewayController extends Controller
{
    private $gatewaySettings;
    public function __construct(PaymentGatewayService $gatewaySettings)
    {
        $this->gatewaySettings = $gatewaySettings;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = $this->gatewaySettings->index();
        return view('paymentgateway::settings.gateway-settings', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('paymentgateway::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PaymentGatewayRequestForm $request)
    {
         
        // $this->gatewaySettings->store($request->all());   
        try {
            $gateway = $request->payment_method;
            $paymentGateway = PaymentGateway::where('gateway', $gateway)->first();
            
            if($paymentGateway){
                $types = $request->types;
                foreach($types as $key=>$value) {                   
                    PaymentGatewayDetail::updateOrCreate([
                        'payment_gateway_id'=>$paymentGateway->id,
                        'key'=>$key
                    ], [                    
                        'value'=>$value
                    ]);
                    writeToEnvFile($key, $value);  
                    
                   
                }            
                $paymentGateway->is_active = $request->is_active;
                $paymentGateway->is_recurring = $request->is_recurring;                
                $paymentGateway->sandbox = $request->sandbox ? 1 : 0;
                $paymentGateway->type = $request->payment_type;               
                $paymentGateway->save();  
                             
            }
            if($gateway == 'Cash_on_Delivery') {
                $activationSetting = SystemSetting::where('entity', 'enable_cod')->first();
                $value = $request->is_active == 1 ?  1 : 0;

                if ($activationSetting != null) {
                    $activationSetting->value = $value;
                    $activationSetting->save();
                } else {
                    $activationSetting = new SystemSetting;
                    $activationSetting->entity = 'enable_cod';
                    $activationSetting->value = $value;
                    $activationSetting->save();
                }
            }            
            cacheClear();
            flash(localize("Payment settings updated successfully"))->success();
            return back();
        } catch (\Throwable $th) {
            Log::info('Payment methods setting update issues :'. $th->getMessage());
            flash(localize("Payment settings updated failed"))->error();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('paymentgateway::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('paymentgateway::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
