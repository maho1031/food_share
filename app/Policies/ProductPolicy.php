<?php

namespace App\Policies;


use App\User;
use App\Product;
use App\Shop;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *

     * @param  \App\Shop  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    // public function view(Shop $shop, Product $product)
    // {
    //     return true;
    // }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\Shop 

     * @return mixed
     */
    public function create(Shop $shop)
    {
        return true;
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function edit(Shop $shop, Product $product)
    {
        return $shop->id == $product->shop_id;
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(Shop $shop, Product $product)
    {
        return $shop->id == $product->shop_id;
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function restore(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
