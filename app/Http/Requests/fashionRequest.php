<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fashionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'fashion.fashionName' => 'required|string|max:100',
            'fashion.fashionOverview' => 'required|string|max:4000',
            'fashion.syuunou' => 'required|string|max:4000',
        ];
    }

        public function messages()
    {
        return [
            'fashionName.required' => 'ファッションアイテムネームの入力は必須です。',
            'fashionOverview.required'  => 'ファッションアイテムの概要は必須です。',
            'syuunou.required' => '収納場所は必須項目です。',
        ];
    }
}