<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class TRansformLogs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directoryPath = public_path("storage/logs-fashmore");
        $files = File::allFiles($directoryPath);
$i= 0 ;
        $logsInRange = [];

        foreach ($files as $file) {
            $array =json_decode(File::get($file), true);
            if(isset($array[0]))
            $array =$array[0];
            if(isset($array["data"]))
            $array =$array["data"];
//            if(isset($array[0]))
//            $array =$array[0];
            $filename = $file->getFilename();
            echo $i++;
                $filePath = public_path('storage/transaction-logs/'.'10-19-113-135'.'_'.date('ymdhis').'.json');
                $directoryPath = public_path('storage/transaction-logs');

                if (! file_exists($directoryPath) && ! is_dir($directoryPath)) {
                    mkdir($directoryPath, 0777, true);
                }
               $prettier =  array_map(fn($item) => reset($item), $array);
                file_put_contents($filePath, json_encode($prettier), FILE_APPEND);
sleep(1);

        }
    }
}
