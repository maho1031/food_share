<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

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

    protected function failedValidation( Validator $validator )
    {
        $response['data']    = [];
        $response['status']  = 'NG';
        $response['summary'] = 'Failed validation.';
        $response['errors']  = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json( $response, 422 )
        );
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
            'exp_date' => 'required',
            'comment' => 'required|string|max:255',
            'pic1' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:1024',  //imageを削除
            'shop_id' => 'exists:shops,id',
            'buyer_id' => 'integer|nullable|exists.users,id',
         
    
        ];
    }

    // Override
    // protected function failedValidation(Validator $validator)
    // {
    //     $errors = collect($validator->errors());
    //     $messages = $errors->map(function($error_messages){

    //         return $error_messages[0];

    //     });

    //     throw new HttpResponseException(response(
    //         $messages,
    //         422
    //     ));
    // }


    public function messages(){
        
        return [
            'image' => '指定されたファイルが画像ではありません。',
            'mines' => '指定された拡張子が(jpg/jpeg/png)ではありません。',
            'max' => 'ファイルサイズは2MB以内にして下さい。'
        ];
    }

    public function attributes()
{
    return [
        'name' => '商品名',
        'category_id' => 'カテゴリー',
        'price' => '金額',
        'exp_date' => '賞味期限',
        'comment' => 'コメント',
        'pic1' => '商品',
    ];
}

  
}
