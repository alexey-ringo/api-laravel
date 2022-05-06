<?php

namespace App\Http\Requests\Ps;

use Illuminate\Foundation\Http\FormRequest;

class IndexEventPsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'limit' => 'integer',
            'offset' => 'integer',
        ];
    }
}
