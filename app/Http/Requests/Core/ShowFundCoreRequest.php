<?php

namespace App\Http\Requests\Core;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ShowFundCoreRequest
 * @package App\Http\Requests\Core
 *
 */
class ShowFundCoreRequest extends FormRequest
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
