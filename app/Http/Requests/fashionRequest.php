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
        ];
    }
}