<?php

namespace App\Http\Controllers\Ajax;

use App\Shop;
use App\Conveni;
use App\Product;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Requests\StoreProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AjaxController extends Controller
{

    // 商品一覧ページ
    public function index(Request $request){

        return Product::with('shop')->with('shop.conveni')->with('category')->orderBy(Product::CREATED_AT, 'desc')->get();
   
    }

    //商品一覧 
    public function show(Request $request){
        $productid = $request->input('productid');
        // $product = $request->input('product');
        // dd($productid);

        return Product::with('shop')->with('shop.conveni')->with('category')->where('id',$productid)->get();
   
    }

    // 商品新規登録
    public function store(StoreProduct $request){
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->exp_date = $request->exp_date;
        $product->comment = $request->comment;


        // 送信された画像を格納
        $product_img = $request->file('pic1');
        

        if(!is_null($product_img) && $product_img->isValid() ){

            // 画像アップロードはサービスに切り離し
            $imgNameToStore = ImageService::upload($product_img);

            // DBへ保存
            $product->pic1 = $imgNameToStore;
        }

         // ユーザーID
         $product->shop_id = Auth::id();

         // 全て保存
         $product->save();
 
 
         return redirect()->route('shop.show');
    }
}
