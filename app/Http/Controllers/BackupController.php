<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class BackupController extends Controller
{

    public function index() {
        try {
            Artisan::call('backup:run --only-db');
            $output = Artisan::output();

            error_log($output);

            // Retorna una respuesta a la vista, por ejemplo
            return response()->json([
                'message' => 'Backup completed successfully',
                'output' => $output
            ]);

        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    
    }
    public function json() {
        $backups = Storage::disk('local')->allFiles('SISTEMA DE GESTION DE BIBLIOTECA');

        $data = [];

        foreach ($backups as $backup) {
            array_push(
                $data
                ,[
                'name' => $backup,
                'size' => Storage::disk('local')->size($backup) / 1024,
                'last_modified' => Carbon::parse(Storage::disk('local')->lastModified($backup))
            ],
            );
        }
        
        return response()->json($data);
    }

    public function restore(string $file) {
       
     
        error_log($file);
        try {
           // $data = Storage::disk('local')->get('SISTEMA DE GESTION DE BIBLIOTECA\\'.$file);

            $zip = new ZipArchive();
            $status = $zip->open("C:\\Users\\DEVELOP\\Biblioteca-Proyecto\\storage\\app\\SISTEMA DE GESTION DE BIBLIOTECA\\". $file);
            $storageDestinationPath= storage_path("app\\uploads\\unzip\\");           
            if (!File::exists( $storageDestinationPath)) {
                File::makeDirectory($storageDestinationPath, 0755, true);
            }       
            $zip->extractTo($storageDestinationPath);
            $zip->close();   
                
            $sql = file_get_contents($storageDestinationPath . 'db-dumps\\mysql-biblioteca.sql');

            $response = DB::unprepared($sql);

        }
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }
        
        return response()->json("ok");
    }
}
