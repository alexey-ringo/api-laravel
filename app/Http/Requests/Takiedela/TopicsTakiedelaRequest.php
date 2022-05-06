<?php

namespace App\Http\Requests\Takiedela;

use Illuminate\Foundation\Http\FormRequest;

class TopicsTakiedelaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'case_id' => 'array'
        ];
    }
}
