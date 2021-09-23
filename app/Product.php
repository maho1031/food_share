<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Constant;



class Product extends Model
{


    protected $fillable = ['name', 'price', 'exp_date', 'comment', 'pic1'];

    protected $dates = ['exp_date'];


    public function shop(){
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }

    public function buyers(){
        return $this->belongsTo('App\User', 'buyer_id', 'id');
    }

    public function conveni(){
        return $this->belongsTo('App\Conveni','App\Shop');
   
    }

    public function users(){
        return $this->belongToMany('App\Cart', 'product_id')->withPivot(['id']);
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    // 検索機能
    // 並び替え
    public function scopeSortOrder($query, $sortOrder)
    {
        // if($sortOrder === null || $sortOrder === \Constant::SORT_ORDER['recommend']){
        //     return $query->orderBy('sort_order', 'asc');
        // }

        if($sortOrder == \Constant::SORT_ORDER['higherPrice']){
            return $query->orderBy('price', 'desc');
        }

        if($sortOrder === \Constant::SORT_ORDER['lowerPrice']){
            return $query->orderBy('price', 'asc');
        }

        if($sortOrder === \Constant::SORT_ORDER['later']){
            return $query->orderBy('created_at', 'desc');
        }

        if($sortOrder === \Constant::SORT_ORDER['older']){
            return $query->orderBy('created_at', 'asc');
        }
    }

    public function scopeSelectCategory($query, $categoryId){
        if($categoryId !== '0'){
            return $query->where('category_id',$categoryId);
        }else{
            return;
        }

    }

    // キーワード検索
    public function scopeSearchKeyWords($query, $keyword)
    {
        if(!is_null($keyword)){
            $spaceConvert = mb_convert_kana($keyword, 's'); //全角スペースを半角に
            $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY); //空白で区切る
            foreach($keywords as $word) //単語をループで回す
            {
                $query->where('products.name', 'like', '%' .$word. '%');
            }
            return $query;
        }else{
            return;
        }
    }

}