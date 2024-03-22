<?php

namespace App\Http\Controllers\Backend;

use ZipArchive;
use Carbon\Carbon;
use App\Models\License;
use App\Traits\SystemUpdate;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Http\Services\SystemUpdateService;
use App\Utils\AppStatic;

class SystemUpdateController extends Controller
{
    use SystemUpdate;
    public function index(Request $request)
    {
     
        ini_set('memory_limit', '-1');

        if($this->exitLicense($request) == false) {
            flash("Please activate your application with purchase code")->warning();
            return redirect()->route('admin.about-update');
        }

        $healthCheckSystem = $this->healthCheckSystem();
        if ($healthCheckSystem == false) {
            flash("Your server does not have permission to update. Please try manual update")->warning();
            return redirect()->route('admin.about-update');
        }

        $updatedFileList = [];

        $isWriteableFiles = $this->getChangedFileList(null, true, true);
        
        if (count($isWriteableFiles) > 0) {
            flash("Your server does not have file permission to update. please give permission this files")->warning();
            return redirect()->route('system.file-permission');
        }
        try {
            $name = 'VersionUpdate.zip';
            $versionList = $this->versionUpdate();

            if (!empty($versionList)) {
                foreach ($versionList as $version => $data) {
                    try {
                        $updateFile = $data->link;                 
                        $basePath   = base_path('/storage/app/public/temp_update/');

                        if (!file_exists($basePath)) {
                            mkdir($basePath, 0777);
                        }
                        // download file and put into directory
                        file_put_contents($basePath . $name, fopen($updateFile, 'r'));

                        $zip = new ZipArchive;
                        $res = $zip->open($basePath . $name);

                        $latestFileDirPath = $basePath . getNumberFromString($version) . '/';
                        if ($res === true) {
                            $zip->extractTo($latestFileDirPath);
                            $zip->close();
                        } else {
                            abort(500, 'Error! Could not open File');
                        }

                        //  check json file exits
                        $str = @file_get_contents($latestFileDirPath . 'config.json', true);
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
                        // file unzip path
                        $src = storage_path('app/public/temp_update') . '/' . getNumberFromString($version);
                        $dst = base_path('/');

                        // take backup file
                        $this->backupFiles($version);

                        // file replace for update
                        $this->applyUpdate($src, $dst, $version, $updatedFileList);

                        // take  file from storage path
                        if (storage_path('app/public/temp_update')) {
                            $this->deleteDirectory(storage_path('app/public/temp_update'));
                        }
                        if (storage_path('app/public/temp_update')) {
                            $this->deleteDirectory(storage_path('app/public/temp_update'));
                        }

                        //  file migration
                        $this->dbMigration();

                        // version update in database
                        SystemSetting::updateOrCreate(
                            [
                                'entity' => 'software_version'
                            ],
                            [
                                'value' => $version
                            ]
                        );



                        SystemSetting::updateOrCreate(
                            [
                                'entity' => 'last_update'
                            ],
                            [
                                'value' => Carbon::now()
                            ]
                        );
                        // take last [maxUpdateFile] ex: 5 version and delete others 
                        $this->removeBackupVersion($version);
                        // remove cache
                        writeToEnvFile('APP_VERSION', 'v'.$version);
                        cacheClear();
                    } catch (\Throwable $th) {
                        Log::info("Loop Version : Failed to Update New Versions : ".json_encode(errorArray($th)));

                        // restore if version update interrupt
                        $this->interruptBackupFileRestore($updatedFileList);
                    }
                }
                flash("Your system successfully updated")->success();
            }
            return redirect()->back();
        } catch (\Throwable $e) {
            Log::info("Failed to Update New Versions : ".json_encode(errorArray($e)));

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
    # file copy
    public function applyUpdate($src, $dst, $version, &$updatedFileList)
    {
        $version = getNumberFromString($version);
        $backupPath = base_path('storage' . AppStatic::DS . 'backupFile' . AppStatic::DS . $version . AppStatic::DS);
        if (!file_exists($backupPath)) {
            mkdir($backupPath, 0777, true);
        }
        try {
            $dir = opendir($src);
            @mkdir($dst);
            while (false !== ($file = readdir($dir))) {
                if (($file != '.') && ($file != '..')) {
                    if (is_dir($src . '/' . $file)) {
                        $this->applyUpdate($src . '/' . $file, $dst . '/' . $file, $version, $updatedFileList);
                    } else {
                        $updatedFileList[] = $src . '/' . $file;
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
            closedir($dir);
        } catch (\Throwable $e) {
            Log::info("Apply Update : Failed : ".json_encode(errorArray($e)));

            flash('Operation Failed')->error();
            return redirect()->back();
        }
    }
    # system ready to update
    public function checkServerConnection($version)
    {
        try {
            $systemCheck = $this->systemCheck();
            if ($systemCheck == false) {
                flash("Your server does not have permission to update")->warning();
            }
            $filePermissions = $this->getChangedFileList($version, $is_writeable = false);
            if ($filePermissions && count($filePermissions) > 0) {
                flash("Your server does not have the permission to write for the below files with red color")->warning();
                return redirect()->route('system.file-permission');
            }
            flash('Your server is compatible with single click update')->success();
            return redirect()->route('admin.about-update');
        } catch (\Throwable $th) {
            flash($th->getMessage())->success();
            return redirect()->route('admin.about-update');
        }
    }
    # system ready to update
    public function healthCheck()
    {
        try {
            $systemCheck = $this->healthCheckSystem();
            return redirect()->back();
        } catch (\Throwable $th) {
            flash($th->getMessage())->success();
            return redirect()->route('admin.about-update');
        }
    }
    
    # db migration
    private function dbMigration()
    {
        try {
            # artisan cmd
            Artisan::call('migrate', array('--force' => true));
        } catch (\Throwable $th) {
            //throw $th;
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
            Log::info('license save when update :' . $e->getMessage());
            return false;
        }

    }
}
