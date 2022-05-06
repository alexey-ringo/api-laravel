<?php

namespace App\Http\Requests\Ps;

use Illuminate\Foundation\Http\FormRequest;

class ShowUserIdEventPsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' => 'integer',
            'status' => 'string',
            'limit' => 'integer',
            'offset' => 'integer',
        ];
    }
}
