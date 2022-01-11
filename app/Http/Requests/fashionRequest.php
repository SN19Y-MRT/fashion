<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fashionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'fashion.fashion name' => 'required|string|max:100',
            'fashion.fashion overview' => 'required|string|max:4000',
        ];
    }
}