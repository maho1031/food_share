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
    // TOPページ
    public function home(){
        return Product::take(8)->with('shop')->with('shop.conveni')->orderBy(Product::CREATED_AT, 'desc')->get();
    }

    // 商品一覧ページ
    public function index(Request $request){
        // $sort_id = $request->sort;

        // $query = Product::SortOrder($request->sort);
        // dd($query);
        // $query = Product::query()->with('shop')->with('shop.conveni');

        // $sort_id = $request->input('sort');


        // if((int)$sort_id === 1){
        //     $products = $query->PriceSort();
        // }
        
        
        // $products = $query->orderBy('created_at', 'desc')->get();

        return Product::with('shop')->with('shop.conveni')->with('category')->orderBy(Product::CREATED_AT, 'desc')->get();
        // return $products;
    }
}
