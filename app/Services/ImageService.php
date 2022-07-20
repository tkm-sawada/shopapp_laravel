<?php

namespace App\Services;

use InterventionImage;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function upload($imageFile, $folderName)
    {//画像アップロード
      //$file = $request->file('image');
      $fileName = uniqid(rand() . '_') . '.' . $imageFile->extension(); 
      $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
      Storage::put('public/' . $folderName . '/' . $fileName, $resizedImage); 

      return $fileName;
    }
}