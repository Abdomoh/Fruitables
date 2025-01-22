<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImageCategory
{
    public function uploadFile($file, $directory='uploads/images')
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $originalName . '_' . time() . '.' . $file->extension();
        $filePath = $file->move($directory, $fileName);
        return $filePath;
    }
}
