<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Services\SystemUpdateService;
use App\Http\Requests\LicenseVerificationRequestForm;
use App\Traits\SystemUpdate;

class LicenseController extends Controller
{
    use SystemUpdate;
    public function store(LicenseVerificationRequestForm $request)
    {
        try {
            $opts = [
                'purchase_code'        => $request->purchase_code,
                'app_name'             => env('APP_NAME'),
                'current_version'      => env('APP_VERSION'),
                'server_info'          => $_SERVER,
                'customer_current_url' => URL::to('/'),
            ];
    
            $systemService = new SystemUpdateService();
    
            $healthCheck = $systemService->healthCheck(['data' => '']);
            if ($healthCheck == true) {
                $response = json_decode($systemService->verification($opts));
                if ($response) {
                    if ($response->status == true && $response->code == 201) {
                        file_put_contents(storage_path('app/') . '.access_token', $response->data->client_token);
                        file_put_contents(storage_path('app/') . '.purchase_code', $response->data->purchase_code);
                        $message = $response->message;
                    }
                    if ($response->status == false && $response->code == 525) {
                        $message = $response->message;
                    }
                }
    
            }else{
                flash('Please contact your service provider')->warning();
                return redirect()->back();
            }
            $license = License::updateOrCreate([
                'purchase_code'=>$response->data->purchase_code,
                'client_token'=>$response->data->client_token
            ]);   
       
            return response()->json(['status'=>true, 'msg'=>'Operation Successful']);
        
        } catch (\Throwable $th) {
            return response()->json(['status'=>false, 'msg'=>$th->getMessage()]);

        }
        
    }
    public function versions()
    {
        $license = License::first();
        $opts = [
            'purchase_code'        => $license->purchase_code,
            'app_name'             => env('APP_NAME'),
            'current_version'      => env('APP_VERSION'),
            'server_info'          => $_SERVER,
            'customer_current_url' => URL::to('/'),
            'client_token'         => $license->client_token,
            'product_type'         => 1
        ];
        $systemService = new SystemUpdateService();
        $response = json_decode($systemService->versionLists($opts));
        dd($response);
    }
    public function healthCheck(Request $request)
    {
        $status = false;
        $version = null;
        $msg = 'Please submit your purchase code';
        $response = [];
        $license = License::first();
        $response = $this->versionList();
    
   
    
        if(!empty($response)){
            if($response->status == true && empty($response->data->version_lists)) {
                $version = currentVersion();
                 $status = true;
            }
            if($response->data->version_lists) {
                $response = (array)$response->data->version_lists;
               
                if(array_key_exists('status', $response)){
                     $status = false;
                }else{
                
                    $version = array_key_last($response);
                    $status = true;
                }
            }


        }
        session()->put('latestVersion', $version);
        return response()->json(['status' => $status, 'version'=>$version, 'msg'=>$msg]);
    }
}
