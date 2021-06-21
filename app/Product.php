<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'exp_date', 'comment', 'pic1'];


public function shop(){
    return $this->belongsTo('App\Shop');
}

public function buyers(){
    return $this->belongsTo('App\User');
}
public function conveni(){
    return $this->belongsTo('App\Conveni');
}
}