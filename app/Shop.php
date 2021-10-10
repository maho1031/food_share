<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\BareMail;
use App\Notifications\ShopPasswordResetNotification;

class Shop extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'conveni_id', 'prefecture_id', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function conveni()
    {
        return $this->belongsTo('App\Conveni','conveni_id','id');
    }

    public function prefectures()
    {
        return $this->belongsTo('App\Prefecture', 'prefecture_id', 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ShopPasswordResetNotification($token, new BareMail()));
    }
}
