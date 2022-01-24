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
            'image' => 'mimes:jpeg,jpg,png,gif|max:10240',
        ];
    }
    
        public function messages()
    {
        return [
            'fashionName.required' => 'fashion item Nameは必須です。',
            'fashionOverview.required'  => 'fashion itemの概要は必須です。',
            'image.mimes'    => 'ファイルタイプをjpeg,jpg,png,gifに設定してください。',
            'image.max'      => 'ファイルサイズを10MB以下に設定してください。',
        ];
    }
}