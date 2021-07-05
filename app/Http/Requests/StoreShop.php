<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreShop extends FormRequest
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
            'email' => ['required', 'email',Rule::unique('users')->ignore(Auth::id())],
            'password' => 'required|string|min:8|confirmed',
            'conveni_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'prefecture_id' => 'required|integer',
            'address' => 'required|string|max:50',
        ];
    }

    public function attributes()
{
    return [
        'name' => '支店名',
        'address' => '住所',
    ];
}
}
