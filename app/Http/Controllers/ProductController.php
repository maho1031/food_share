<?php

namespace App\Http\Controllers;

use Image;
use App\Conveni;
// use Faker\Provider\Image;
use App\Product;
use InterventionImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->sortByDesc('created_at');
        $convenis = Conveni::all();

        // dd($products);

        return view('products.index', compact('convenis', 'products'));
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
        $product->name = $request->name;
        $product->price = $request->price;
        $product->exp_date = $request->exp_date;
        $product->comment = $request->comment;


        // 送信された画像を格納
        $product_img = $request->file('pic1');
        

        if(!is_null($product_img) && $product_img->isValid() ){

            // 画像アップロードはサービスに切り離し
            $imgNameToStore = ImageService::upload($product_img);


            // 元のファイルから拡張子を取ってくる
            // $file_ext = $product_img->getClientOriginalExtension();

            // // 画像のサイズを変更
            // $img = InterventionImage::make($product_img);
            // // \InterventionImage
            // $width = 500;
            // $img->resize($width, null, function($constraint){
            //     $constraint->aspectRatio();
            // });

            // //画像名をランダムな文字列に変換
            // // $img_path = Str::random(30).'.'.$file_ext;  
            // $img_path = uniqid(rand().'_');
            // $imgNameToStore = $img_path.'.'.$file_ext;


            // // 画像のパスを取得
            // $save_path = storage_path('app/public/uploads/'.$imgNameToStore);
            // // storageへ保存
            // $img->save($save_path);

            // DBへ保存
            $product->pic1 = $imgNameToStore;

        }

        // ユーザーID
        $product->shop_id = Auth::user()->id;

        // 全て保存
        $product->save();


        return redirect()->route('shop.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        // GETパラメータが数字かどうかチェックする
        if(!ctype_digit($product_id)){
            return redirect('/');
        }

        $product = Product::findOrFail($product_id);

        return view('products.show',compact('product'));
    }

    public function sshow($product_id)
    {
        // GETパラメータが数字かどうかチェックする
        if(!ctype_digit($product_id)){
            return redirect('/');
        }

        $product = Product::findOrFail($product_id);

        return view('products.sshow',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        // GETパラメータが数字かどうかチェックする
        if(!ctype_digit($product_id)){
            return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        }

        $product = Product::findOrFail($product_id);

        //自分が作成した商品のみ編集できる様にする
        // $this->authorize('edit', $product);

        // 認証情報の確認
        if($product->shop_id !== Auth::user()->id){
            abort(403);
        }

        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $product_id)
    {
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
        $product->price = $request->price;
        $product->exp_date = $request->exp_date;
        $product->comment = $request->comment;

         // 送信された画像を格納
         $product_img = $request->file('pic1');
        //  var_dump($product_img);
        

         if(!is_null($product_img && $product_img->isValid())){

            $imgNameToStore = ImageService::upload($product_img);
             // 元のファイルから拡張子を取ってくる
            //  $file_ext = $product_img->getClientOriginalExtension();
 
            //  // 画像のサイズを変更
            //  $img = InterventionImage::make($product_img);
            //  // \InterventionImage
            //  $width = 500;
            //  $img->resize($width, null, function($constraint){
            //      $constraint->aspectRatio();
            //  });
 
            //  //画像名をランダムな文字列に変換
            // //  $img_path = Str::random(30).'.'.$file_ext; 
            // $img_path = uniqid(rand().'_');
            // $imgNameToStore = $img_path.'.'.$file_ext; 
 
            //  // 画像のパスを取得
            //  $save_path = storage_path('app/public/uploads/'.$imgNameToStore);
            //  // storageへ保存
            //  $img->save($save_path);
 
             // DBへ保存
            //  $product->pic1 = $imgNameToStore;
 
         }

         // DBへ保存
         if(!is_null($product_img && $product_img->isValid())){
            $product->pic1 = $imgNameToStore;
         }
 
         // ユーザーID
         $product->shop_id = Auth::user()->id;

        //  保存する
         $product->save();

         return redirect()->route('shop.show');

    // }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        if(!ctype_digit($product_id)){
            return redirect('/');
        }

        $product = Product::findOrFail($product_id);

        if($product->shop_id !== auth()->id()){
            abort(403);  //認証情報
        }

        // storageの中も削除
        $filePath = 'app/public/uploads/' . $product->pic1;

        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }

        $product->delete();

        return redirect()->route('shop.show');
    }

    public function add(Request $request, $product_id){

        // GETパラメータが数字かどうかチェックする
        if(!ctype_digit($product_id)){
            return redirect('/');
        }
        $product = Product::findOrFail($product_id);

        $product->buyer_id = Auth::user()->id;
        $product->sold_flg = 1;

        //  保存する
        $product->save();

        return redirect('/');
    }
    
}
