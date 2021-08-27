<?php

namespace App\Services;

use InterventionImage;



class ImageService
{
    public static function upload($product_img){

        //画像名をランダムな文字列に変換
        $img_path = uniqid(rand().'_');

        // ファイルの拡張子を取ってくる
        $file_ext = $product_img->getClientOriginalExtension();
 
        // 画像のサイズを変更
        $img = InterventionImage::make($product_img);
        $width = 500;
        $img->resize($width, null, function($constraint){
            $constraint->aspectRatio();
             });
            
        $imgNameToStore = $img_path.'.'.$file_ext; 

         // 画像のパスを取得
         $save_path = storage_path('app/public/uploads/'.$imgNameToStore);
         // storageへ保存
         $img->save($save_path);
 
        return $imgNameToStore;
    }
}