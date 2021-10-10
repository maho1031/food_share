<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|integer',
            'exp_date' => 'required|date',
            'comment' => 'required|string|max:255',
            'pic1' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:1024',  //imageを削除
            'shop_id' => 'exists:shops,id',
            'buyer_id' => 'integer|nullable|exists.users,id',
         
    
        ];
    }



    public function messages(){
        
        return [
            'image' => '指定されたファイルが画像ではありません。',
            'mines' => '指定された拡張子が(jpg/jpeg/png)ではありません。',
        ];
    }

    public function attributes()
{
    return [
        'name' => '商品名',
        'category_id' => 'カテゴリー',
        'price' => '金額',
        'exp_date' => '賞味期限',
        'comment' => '商品詳細',
        'pic1' => '商品',
    ];
}

  
}
