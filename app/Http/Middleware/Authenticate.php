<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    // 追加
    protected $user_route = 'user.login';
    protected $shop_route = 'shop.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // return route('login');
        if(Route::is('shop.*')){
            return route($this->shop_route);
        }else{
            return route($this->user_route);
        }




    }
}
