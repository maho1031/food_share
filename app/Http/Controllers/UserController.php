<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Product;
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
        
        return view('users.show');
    
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

        $user->fill($request->all())->save();


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
