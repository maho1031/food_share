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
use App\Jobs\SendOrderMail;
use Illuminate\Support\Str;
use App\Jobs\SendThanksMail;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
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

      

        return view('products.index', compact('convenis', 'categories', 'products'));
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
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        // GETパラメータが数字かどうかチェックする
        $validator = \Validator::make($product_id, [
            'product_id' => 'integer',
        ]);

        if($validator->fail()){
            abort(400);
        };

        $product = Product::findOrFail($product_id);

        return view('products.show',compact('product_id', 'product'));
    }

    public function detail($product_id)
    {
        // GETパラメータが数字かどうかチェックする
         $validator = \Validator::make($product_id, [
             'product_id' => 'integer',
         ]);

         if($validator->fail()){
             abort(400);
         };

        $product = Product::findOrFail($product_id);

        return view('products.detail',compact('product_id','product'));
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
         $validator = \Validator::make($product_id, [
             'product_id' => 'integer',
         ]);

         if($validator->fail()){
             abort(400);
         };

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $validator = \Validator::make($request->all(), [
            'product_id' => 'integer',
        ]);

        if($validator->fail()){
            abort(400);
        };

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

         $validator = \Validator::make($request->all(), [
             'product_id' => 'integer',
         ]);

         if($validator->fail()){
             abort(400);
         };

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

        
        $validator = \Validator::make($request->all(), [
            'product_id' => 'integer',
        ]);

        if($validator->fail()){
            abort(400);
        };
        

        $product = Product::findOrFail($product_id);


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
