<?php

namespace App\Http\Controllers\Shop;

use App\Shop;
use App\Conveni;
use App\Prefecture;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShop;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:shop');
    }

    public function index()
    {
        //
    }

    public function productList(){


        return view('shops.productList');
    }

    public function soldList(){

        
        return view('shops.soldList');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        return view('shop.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        // $id = Auth::user()->id;

        // $shop = Shop::findOrFail($id);

        // if($shop->id !== auth()->id()){
        //     abort(403);  //認証情報
        // }

        $convenis = Conveni::all();
        $prefectures = Prefecture::all();

        return view('shop.edit', compact('convenis', 'prefectures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreShop $request)
    {
        $user = Auth::user();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->conveni_id = $request->conveni_id;
        $user->name = $request->name;
        $user->prefecture_id = $request->prefecture_id;
        $user->address = $request->address;


        $user->save();


        return redirect('/shop/show/');
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
