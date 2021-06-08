<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conveni extends Model
{
    protected $table = 'convenis';

    protected $fillable = [
        'name'
    ];
    public function products()
    {
      return $this->hasMany('App\Product');
    }
}
