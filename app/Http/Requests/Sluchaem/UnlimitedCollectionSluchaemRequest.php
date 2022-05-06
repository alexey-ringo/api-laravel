<?php

namespace App\Http\Requests\Sluchaem;

use Illuminate\Foundation\Http\FormRequest;

class UnlimitedCollectionSluchaemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'limit' => 'integer',
            'offset' => 'integer',
            'order' => 'string',
            'category' => 'array'
        ];
    }
}
