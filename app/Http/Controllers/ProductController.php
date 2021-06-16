<?php

namespace App\Http\Controllers;

use App\Product;
use Image;
// use Faker\Provider\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = new Product;

        $product->fill($request->all());

        // 送信された画像を格納
        $product_img = $request->file('pic1');
        

        if($product_img){
            // 元のファイルから拡張子を取ってくる
            $file_ext = $product_img->getClientOriginalExtension();

            // 画像のサイズを変更
            $img = \Image::make($product_img);
            // \InterventionImage
            $width = 500;
            $img->resize($width, null, function($constraint){
                $constraint->aspectRatio();
            });

            //画像名をランダムな文字列に変換
            $img_path = Str::random(30).'.'.$file_ext;  

            // 画像のパスを取得
            $save_path = storage_path('app/public/uploads/'.$img_path);
            // storageへ保存
            $img->save($save_path);

            // DBへ保存
            $product->pic1 = $img_path;

        }

        // ユーザーID
        $product->shop_id = Auth::user()->id;
        $product->save();


        return redirect()->route('shop.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
