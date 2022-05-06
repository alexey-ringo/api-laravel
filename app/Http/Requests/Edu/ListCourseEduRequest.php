<?php

namespace App\Http\Requests\Edu;

use Illuminate\Foundation\Http\FormRequest;

class ListCourseEduRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'integer|required_without:email',
            'email' => 'string|required_without:id',
        ];
    }
}
