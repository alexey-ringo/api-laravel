<?php

namespace App\Http\Requests\Edu;

use Illuminate\Foundation\Http\FormRequest;

class IndexUsersTeachersEduRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'nullable|integer',
            'email' => 'nullable|string',
        ];
    }
}
