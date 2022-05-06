<?php

namespace App\Http\Requests\Sluchaem;

use Illuminate\Foundation\Http\FormRequest;

class PaginationCollectionSluchaemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'page' => 'integer',
            'order' => 'string',
            'category' => 'array'
        ];
    }
}
