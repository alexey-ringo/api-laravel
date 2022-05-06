<?php

namespace App\Http\Requests\Sluchaem;

use Illuminate\Foundation\Http\FormRequest;

class CollectionSluchaemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'page' => 'sometimes|integer',
            'limit' => 'sometimes|integer',
            'offset' => 'sometimes|integer',
            'order' => 'sometimes|string',
            'category' => 'sometimes|array',
            'inn' => 'sometimes|int_or_array',
            'get_all' => 'sometimes|string',
            'active' => 'sometimes|string'
        ];
    }
}
