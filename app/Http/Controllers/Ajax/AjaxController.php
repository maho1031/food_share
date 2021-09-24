<?php

namespace App\Http\Controllers\Ajax;

use App\Shop;
use App\Conveni;
use App\Product;
use App\Category;
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

    //商品一詳細
    public function show(Request $request){
        $product_id = $request->input('product_id');
        // $product = $request->input('product');
        // dd($productid);

        return Product::with('shop')->with('shop.conveni')->with('category')->where('id',$product_id)->get();
   
    }

    // 商品検索
    public function search(Request $request){
        $products = Product::with('shop.conveni')
        ->with('category')
        ->SearchKeyWords($request->keyword)
        ->SortOrder($request->sort_date)
        ->SortOrder($request->input('sort_price'))
        ->SelectCategory($request->category_id ?? '0') //値がnullだったら０を入れる
        ->orderBy('created_at', 'desc')->get();
        
        return $products;
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
 
 
         return response()->json([
            "message" =>
                "商品情報を登録しました",
        ]);
    }

    // 商品編集
    public function edit(Request $request){
        $product_id = $request->input('product_id');

        $product = Product::with('shop')->with('shop.conveni')->with('category')->where('id',$product_id)->get();

        // dd($product);

        return $product;
 
        // return Product::with('shop')->with('shop.conveni')->with('category')->where('id',$product_id)->get();

    }

    // 商品更新
    public function update(StoreProduct $request)
    {
        $product_id = $request->id;

        // GETパラメータが数字かどうかチェックする
        if(!ctype_digit($product_id)){
            return redirect('/');
        }
        $product = Product::findOrFail($product_id);

        // 認証情報
        if($product->shop_id !== Auth::user()->id){
            abort(403);
        }
        
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->exp_date = $request->exp_date;
        $product->comment = $request->comment;

         // 送信された画像を格納
         $product_img = $request->file('pic1');
        

         if(($product_img !== null  && $product_img->isValid())){

            $imgNameToStore = ImageService::upload($product_img);
            
             // DBへ保存
             $product->pic1 = $imgNameToStore;
 
         }
         // ユーザーID
         $product->shop_id = Auth::id();

        //  保存する
         $product->save();

         return response()->json([
            "message" =>
                "商品情報を更新しました",
        ]);
}

    // shop出品した商品一覧
    public function shopProducts(){

        return Product::with('shop')->with('shop.conveni')->with('category')->where('shop_id', Auth::id())->orderBy('created_at', 'desc')->get();
    }

    // shop購入された商品一覧
    public function shopSoldProducts(){
        return Product::with('shop')->with('shop.conveni')->with('category')->where('shop_id', Auth::id())->where('sold_flg', 1 )->with('shop')->orderBy('created_at', 'desc')->get();
    }

    // shop商品詳細
    public function detail(Request $request){
        $product_id = $request->input('product_id');

        return Product::with('shop')->with('shop.conveni')->with('category')->where('id',$product_id)->get();
    }
}
