<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|max:50',
            'price' => 'required|integer',
            'exp_date' => 'required',
            'comment' => 'required|string|max:255',
            'pic1' => 'file|image|mimes:jpeg,png,jpg,gif|max:1024',
            'buyer_id' => 'integer|nullable'

        ];
    }

    public function attributes()
{
    return [
        'name' => '商品名',
        'price' => '金額',
        'exp_date' => '賞味期限',
        'comment' => 'コメント',
        'pic1' => '商品',
    ];
}
}
