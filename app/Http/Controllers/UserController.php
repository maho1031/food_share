<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $products = Product::with('shop.conveni')->with('category')->where('buyer_id', auth()->id())->orderBy('created_at', 'desc')->get();


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
        // $old_pass = $user->password;

        $user->name = $request->name;
        $user->email = $request->email;

        // if($old_pass === )
        $user->password = Hash::make($request->password);

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
