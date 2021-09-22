<?php

namespace App\Http\Controllers;

use Image;
use App\Shop;
// use Faker\Provider\Image;
use App\User;
use App\Conveni;
use App\Product;
use App\Category;
use App\Mail\TestMail;
use InterventionImage;
use Illuminate\Support\Str;
use App\Jobs\SendThanksMail;
use App\Jobs\SendOrderMail;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = Product::with('shop.conveni')
        ->with('category')
        ->SearchKeyWords($request->keyword)
        ->SortOrder($request->sort_date)
        ->SortOrder($request->sort_price)
        ->SelectCategory($request->category_id ?? '0') //値がnullだったら０を入れる
        ->orderBy('created_at', 'desc')->get();
        
        $convenis = Conveni::all();
        $categories = Category::all();

        // dd($products);

        return view('products.index', compact('convenis','products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {

        // dd($request);

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

        // $product = Product::findOrFail($product_id);
        // $productid = $product_id;
        // dd($product_id);

        return view('products.show',compact('product_id'));
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
        $categories = Category::all();

        //自分が作成した商品のみ編集できる様にする
        // $this->authorize('edit', $product);

        // 認証情報の確認
        if($product->shop_id !== Auth::user()->id){
            abort(403);
        }

        return view('products.edit',compact('product_id','product', 'categories'));
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
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->exp_date = $request->exp_date;
        $product->comment = $request->comment;

         // 送信された画像を格納
         $product_img = $request->file('pic1');
        //  dd($product_img);
        //  var_dump($product_img);
        

         if(($product_img !== null  && $product_img->isValid())){

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
             $product->pic1 = $imgNameToStore;
 
         }

         // DBへ保存
        //  if(!is_null($product_img && $product_img->isValid())){
            // $product->pic1 = $imgNameToStore;
        //  }
 
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
        $shop = Shop::findOrFail($product->shop_id);

        $product->buyer_id = Auth::user()->id;
        $product->sold_flg = 1;

        //  保存する
        $product->save();

        $user = User::findOrFail(Auth::id());

        // 購入したユーザーにメールを送信
        SendThanksMail::dispatch($product, $user);
        // 購入された商品のオーナーにメールを送信
        SendOrderMail::dispatch($product, $user, $shop);
       

        return redirect()->route('users.show');
    }

    public function cancel(Request $request, $product_id){

         // GETパラメータが数字かどうかチェックする
         if(!ctype_digit($product_id)){
            return redirect('/');
        }

        // $user = User::findOrFail(Auth::id());
        

        $product = Product::findOrFail($product_id);

        // dd($product);

        if($product->buyer_id === Auth::id()){
        $product->buyer_id = null;
        $product->sold_flg = 0;

        //  保存する
        $product->save();

        }else{
            abort(403);  //認証情報
        }
        


        return redirect()->route('users.show');
    }
    
}
