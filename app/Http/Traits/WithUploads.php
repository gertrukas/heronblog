<?php

namespace App\Http\Traits;

use Exception;

trait WithUploads
{
    use WithMessages;

    public $file;
    
    public function getFileInfo($file)
    {
        $info = [
            "decoded_file" => null,
            "file_meta" => null,
            "file_mime_type" => null,
            "file_type" => null,
            "file_extension" => null,
        ];

        try {
            $info['decoded_file'] = base64_decode(substr($file, strpos($file, ',') + 1));
            $info['file_meta'] = explode(';', $file)[0];
            $info['file_mime_type'] = explode(':', $info['file_meta'])[1];
            $info['file_type'] = explode('/', $info['file_mime_type'])[0];
            $info['file_extension'] = explode('/', $info['file_mime_type'])[1];
        } catch(Exception $e) {

        }

        return $info;
    }


    public function uploadFiles()
    {
        //vnd.openxmlformats-officedocument.spreadsheetml.sheet
    }

}
