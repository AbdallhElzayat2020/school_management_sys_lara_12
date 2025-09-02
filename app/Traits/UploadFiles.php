<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait UploadFiles
{
    /*
     * Upload File
     */
    public function uploadFile($request, $name)
    {
        $filename = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('', $filename, '');
    }

    /*
     * Delete File
     */
    public function deleteFile($file)
    {
        if (File::exists(public_path($file))) {
            File::delete(public_path($file));
            return response()->json([
                'message' => 'File deleted successfully',
            ], 200);
        }
    }
}
