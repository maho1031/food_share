<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Conveni;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;


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
}
