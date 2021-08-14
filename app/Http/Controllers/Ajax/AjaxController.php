<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;


class AjaxController extends Controller
{
    // 商品一覧ページ
    public function index(){
        return Product::with('shop')->with('conveni')->orderBy(Product::CREATED_AT, 'desc')->get();
    }
}
