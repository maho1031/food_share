<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //  $products = Auth::user()->products;
        $products = Product::where('buyer_id', auth()->id())->get();

        //  dd($products);

        return view('users.show', compact('products'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request)
    {
    

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();


        return redirect('/users/show/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function withDrawal()
    {
        return view('user.destroy');

        // return view('user.destroy',compact('user'));
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();


        return redirect('/');
    }
}
