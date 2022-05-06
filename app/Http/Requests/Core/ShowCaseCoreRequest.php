<?php

namespace App\Http\Requests\Core;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ShowCaseCoreRequest
 * @package App\Http\Requests\Core
 *
 */
class ShowCaseCoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'fields' => [
                'nullable',
                'string',
            ],
            'extra_fields' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
