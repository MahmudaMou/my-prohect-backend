<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUpload
{
    public function imageUpload($requestedImage) // Taking input image as parameter
    {
        try {
            $image_name = Str::random(5);
            $ext = strtolower($requestedImage->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = time() . $image_name . '.' . $ext;
            $upload_path = 'uploads/';    //Creating Sub directory in Public folder to put image
            $image_url = $upload_path . $image_full_name;
            $requestedImage->move($upload_path, $image_full_name);
            return $image_url; // Just return image

        } catch (\Exception $e) {
            //Write your error message here
            dd($e);
        }

    }

    public function downloadableFileUpload($requestedFile) // Taking input image as parameter
    {
        try {
            $file_name = Str::random(5);
            $ext = strtolower($requestedFile->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $file_full_name = 'file'. time() . $file_name . '.' . $ext;
            $upload_path = 'uploads/';    //Creating Sub directory in Public folder to put image
            $file_url = $upload_path . $file_full_name;
            $requestedFile->move($upload_path, $file_full_name);
            return $file_url; // Just return image

        } catch (\Exception $e) {
            //Write your error message here
            dd($e);
        }

    }


}
