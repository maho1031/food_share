<?php

namespace App\Http\Controllers\Ajax;

use App\Shop;
use Validator;
use App\Conveni;
use App\Product;
use App\Category;
use App\Prefecture;
use Illuminate\Http\Request;
use App\Services\ImageService;
use Illuminate\Http\JsonResponse;
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

        // GETパラメータが数字かどうかチェックする
        $validator = Validator::make($request->all(), [
            'product_id' => 'integer',
        ]);

        if($validator->fails()){
            abort(400);
        };
        
        $product_id = $request->input('product_id');


        return Product::with('shop')->with('shop.conveni')->with('category')->where('id',$product_id)->get();
   
    }

    // 商品検索
    public function search(Request $request){

        $products = Product::with('shop.conveni')
        ->with('category')
        ->SearchKeyWords($request->keyword)
        // ->SortOrder($request->sort_price)
        ->MinPrice($request->price_min)
        ->MaxPrice($request->price_max)
        ->SelectCategory($request->category_id ?? '0') //値がnullだったら０を入れる
        ->SelectPrefecture($request->prefecture_id ?? '0')
        ->SortOrder($request->sort_date)->get();
        // ->orderBy('created_at', 'desc')->get();
        
        return $products;
    }

    // 商品新規登録
    public function store(StoreProduct $request){

         // GETパラメータが数字かどうかチェックする
         $validator = Validator::make($request->all(), [
            'id' => 'integer',
        ]);

        if($validator->fails()){
            abort(400);
        };
    
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
            "product" => $product
           
        ]);
    }

    // 商品編集
    public function edit(Request $request){

         // GETパラメータが数字かどうかチェックする
         $validator = Validator::make($request->all(), [
            'product_id' => 'integer',
        ]);

        if($validator->fails()){
            abort(400);
        };

        $product_id = $request->input('product_id');

 
        return Product::with('shop')->with('shop.conveni')->with('category')->where('id',$product_id)->get();

    }

    // 商品更新
    public function update(StoreProduct $request)
    {
         // GETパラメータが数字かどうかチェックする
         $validator = Validator::make($request->all(), [
            'id' => 'integer',
        ]);

        if($validator->fails()){
            abort(400);
        };

        $product_id = $request->id;

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
         // GETパラメータが数字かどうかチェックする
         $validator = Validator::make($request->all(), [
            'product_id' => 'integer',
        ]);

        if($validator->fails()){
            abort(400);
        };
        
        $product_id = $request->input('product_id');

        

        return Product::with('shop')->with('shop.conveni')->with('category')->where('id',$product_id)->get();
    }

    // 都道府県取得
    public function prefectureList(){
        $prefectures = Prefecture::all();
        return $prefectures;
    }
}
