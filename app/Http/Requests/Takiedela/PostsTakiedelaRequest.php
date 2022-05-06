<?php

namespace App\Http\Requests\Takiedela;

use Illuminate\Foundation\Http\FormRequest;

class PostsTakiedelaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'limit' => 'integer',
            'offset' => 'integer',
            'case_id' => 'integer',
            'from' => 'integer',
            'to' => 'integer',
            'orderby' => 'string',
            'order' => 'string'
        ];
    }
}
