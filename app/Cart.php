<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id'];


    public function user_product()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
       
    }

    public function product_user()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
