<?php

namespace App\Http\Requests\Edu;

use Illuminate\Foundation\Http\FormRequest;

class SearchCourseByUrlEduRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'required|url'
        ];
    }
}
