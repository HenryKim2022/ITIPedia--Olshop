<?php

namespace App\Http\Controllers;

use App\Http\Services\SystemUpdateService;
use App\Models\License;
use App\Models\SystemSetting;
use App\Traits\SystemUpdate;
use Carbon\Carbon;
use Database\Seeders\DeliverymanPermissionSeeder;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class UpdateController extends Controller
{
    use SystemUpdate;
    # init update 
    public function init()
    {
        $permission['curl_enabled']           = function_exists('curl_version');
        $permission['mysqli_enable']           = function_exists('mysqli_connect');
        $permission['db_file_write_perm']     = is_writable(base_path('.env'));
        $permission['routes_file_write_perm'] = is_writable(base_path('app/Providers/RouteServiceProvider.php'));

        return view('update.init', compact('permission'));
    }

    # update complete
    public function complete()
    {
        try {  
            Artisan::call('migrate');

            $seeder  = new DeliverymanPermissionSeeder();

            $seeder->run();
            
        } catch (\Throwable $th) {
            //throw $th;
        }

        # latest version
        writeToEnvFile('APP_VERSION', 'v4.2.0');
         
        
        if(!empty(env('RECAPTCHA_SITE_KEY'))){ 
            writeToEnvFile('RECAPTCHAV3_SITEKEY', env('RECAPTCHA_SITE_KEY')); 
        }

        if(!empty(env('RECAPTCHA_SECRET_KEY'))){ 
            writeToEnvFile('RECAPTCHAV3_SECRET', env('RECAPTCHA_SECRET_KEY')); 
        } 

        cacheClear();
        $oldRouteServiceProvider        = base_path('app/Providers/RouteServiceProvider.php');
        $setupRouteServiceProvider      = base_path('app/Providers/SetupServiceComplete.php');
        copy($setupRouteServiceProvider, $oldRouteServiceProvider);
        return view('update.complete');
    }

    
    # db migration
    private function __dbMigration()
    {
        try {
            # artisan cmd
            Artisan::call('migrate');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    #about system update
    public function about()
    {     
        if(!isAdmin()){
            abort(403);
        }
        $is_purchase = false;
        $license = License::first();
        if($license){
            if(!$license->purchase_code || !$license->client_token){
                $is_purchase = false;
            }elseif($license->purchase_code && $license->client_token){
                $is_purchase = true;
            }
        }
        return view('backend.pages.systemSettings.system_update', compact('is_purchase'));
    }

    public function versionUpdateInstall(Request $request)
    {
        if(!isAdmin()){
            abort(403);
        }
       if (env('DEMO_MODE') == "On") {
            flash('Restricted in demo mode')->warning();
            return back();
        }
        ini_set('memory_limit', '-1');

        if($this->exitLicense($request) == false) {
            flash("Please activate your application with purchase code")->warning();
            return redirect()->route('admin.about-update');
        }
        $isWriteableFiles = $this->getChangedFileList();
        
        if (count($isWriteableFiles) > 0) {
            flash("Your server does not have file permission to update. please give permission this files")->warning();
            return redirect()->route('system.file-permission');
        }
       
        $updatedFileList = [];
        try {

            $request->validate([
                'updateFile' => ['required', 'mimes:zip'],
            ]);

            if ($request->hasFile('updateFile')) {
                // $path = $request->updateFile->store('updateFile');
                 //Move Uploaded File

                $zip_file = $request->file('updateFile');
                $basePath = base_path('/storage/app/public/temp_update/');
                if(!file_exists($basePath)) {
                    mkdir($basePath, 0777, true);
                }
                $res = $zip_file->move($basePath, $zip_file->getClientOriginalName());

                $zip = new ZipArchive;
                $res = $zip->open($basePath . $zip_file->getClientOriginalName());

                if ($res === true) {
                    $zip->extractTo($basePath);
                    $zip->close();
                } else {
                    abort(500, 'Error! Could not open File');
                }

                $str = @file_get_contents($basePath . '/config.json', true);
                if ($str === false) {
                    abort(500, 'The update file is corrupt.');
                }

                $json = json_decode($str, true);

                if (!empty($json)) {
                    if (empty($json['version']) || empty($json['release_date'])) {
                        flash('Config File Missing')->error();
                        return redirect()->back();
                    }
                } else {
                    flash('Config File Missing')->error();
                    return redirect()->back();
                }
                $software_version = getSetting('software_version');

                $current_version = Storage::exists('.version') && Storage::get('.version') ? rtrim(Storage::get('.version'), '\n') : $software_version;

                if ($current_version < $json['min']) {
                    flash($json['min'] . ' or greater is  required for this version')->error();
                    return redirect()->back();
                }

                $src = storage_path('app/public/temp_update');
                $dst = base_path('/');
                // take backup file
                $this->backupFiles($json['version']);
                // 
                $this->recurse_copy($src, $dst);

                if (isset($json['migrations']) & !empty($json['migrations'])) {
                    foreach ($json['migrations'] as $migration) {

                        Artisan::call('migrate',
                            array(
                                '--path' => $migration,
                                '--force' => true));
                    }
                }
                SystemSetting::updateOrCreate([
                    'entity'=>'software_version'
                ], [
                    'value'=> $json['version']]
                );

                SystemSetting::updateOrCreate([
                    'entity'=>'last_update'
                ], [
                    'value'=> Carbon::now()]
                );
                writeToEnvFile('APP_VERSION', 'v'.$json['version']);
            }


            if (storage_path('app/public/temp_update')) {
                $this->deleteDirectory(storage_path('app/public/temp_update'));
            }
            if (storage_path('app/public/temp_update')) {
                $this->deleteDirectory(storage_path('app/public/temp_update'));
            }

            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('config:clear');
            Artisan::call('optimize:clear');

            flash("Your system successfully updated")->success();
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info("manual version update issues :" . $e->getMessage());
            // restore if version update interrupt
            $this->interruptBackupFileRestore($updatedFileList);
            if (storage_path('app/public/temp_update')) {
                $this->deleteDirectory(storage_path('app/public/temp_update'));
            }
            if (storage_path('app/tempUpdate')) {
                $this->deleteDirectory(storage_path('app/public/temp_update'));
            }

            flash($e->getMessage())->error();
            return redirect()->back();
        }
    }
    public function recurse_copy($src, $dst)
    {
        if(!isAdmin()){
            abort(403);
        }
        
        try {
            $dir = opendir($src);
            @mkdir($dst);
            while (false !== ($file = readdir($dir))) {
                if (($file != '.') && ($file != '..')) {
                    if (is_dir($src . '/' . $file)) {
                        $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        $updatedFileList[] = $src . '/' . $file;
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
            closedir($dir);
        } catch (\Exception $e) {
            Log::info("manual version copy file  issues :" . $e->getMessage());
            flash($e->getMessage())->error();
            return redirect()->back();
        }
    }
    private function exitLicense($request)
    {
        try{
            $license = License::first();
            if(!$license) {
                $opts = [
                    'purchase_code'        => $request->purchase_code,
                    'app_name'             => env('APP_NAME'),
                    'current_version'      => env('APP_VERSION'),
                    'customer_current_url' => request()->fullUrl(),
                    'product_type'         => 1,
                    'app_env'              => $request->server_mode,
                    'server_info'          => $_SERVER
                ];
    
        
                $systemService = new SystemUpdateService();
                $healthCheck = $systemService->healthCheck(['data' => '']);
                if ($healthCheck == true) {
                    $response = json_decode($systemService->verification($opts));
                    if($response){
                        License::updateOrCreate([
                            'purchase_code'=>$response->data->purchase_code,
                            'client_token'=>$response->data->client_token
                        ],[
                            'app_env'=> $request->server_mode
                        ]);
                    }
                }
            }

            $status = false;
            $license = License::first();
             if($license){
                if(!$license->purchase_code || !$license->client_token){
                    $status = false;              
                }elseif($license->purchase_code && $license->client_token){
                    $status = true;
                    
                }
            }
            return $status;
        }catch(\Exception $e){
            Log::info('license save when manual update :' . $e->getMessage());
            return false;
        }

    }
}
