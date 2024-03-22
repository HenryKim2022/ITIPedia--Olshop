<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\SystemUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use App\Http\Services\SystemUpdateService;
use App\Utils\AppStatic;

class FilePermissionController extends Controller
{
    use SystemUpdate;
    public function index()
    {
        try {
            $response      = $this->versionList();        
            if(!empty($response)){
                $collections   = collect($response->data->version_lists);
                $versionLists  = $collections->slice(AppStatic::maxUpdateFile);
            }   
          
            return view('backend.pages.systemSettings.file_list', compact('versionLists'));
        } catch (Exception $exception) {
            flash($exception->getMessage())->error();
            return redirect()->back();

        }
    }
    public static function countNotEditableFiles()
    {
        $files = self::listOfFiles();
        return count($files);
    }
    public static function listOfFiles()
    {
        $files = [];

        $path = base_path('app');
        $app_files = File::allFiles($path);
        foreach ($app_files as $app_file) {
            if (is_writable($app_file->getPathname()) == false) {
                $files[]['path'] = $app_file->getPathname();
            }
        }

        $path = base_path('resources');
        $resources_files = File::allFiles($path);
        foreach ($resources_files as $resources_file) {
            if (is_writable($resources_file->getPathname()) == false) {
                $files[]['path'] = $resources_file->getPathname();
            }
        }

        $path = base_path('routes');
        $routes_files = File::allFiles($path);
        foreach ($routes_files as $routes_file) {
            if (is_writable($routes_file->getPathname()) == false) {
                $files[]['path'] = $routes_file->getPathname();
            }
        }
        return $files;
    }

    # receive Base path folder name
    private function getNotEditableFile($folder_name, $string_replace = null)
    {
        $files = [];

        $path = base_path($folder_name);
        $app_files = File::allFiles($path);
        foreach ($app_files as $app_file) {
            // if (is_writable($app_file->getPathname()) == false) {
            $files[] = $string_replace ? str_replace($string_replace, '', $app_file->getPathname()) . ',' : '';
            // }
        }
        file_put_contents('change-file-log-update_v3.8.1.php', '<?php' .var_export($files, true).'?>');
        return $files;
    }
    # receive Base path folder name
    public static function getNotEditableFileCount($folder_name)
    {
    }
}
