<?php

namespace App\Http\Requests\Core;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexFundCoreRequest
 * @package App\Http\Requests\Core
 *
 */
class IndexFundCoreRequest extends FormRequest
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
            'filter' => [
                'nullable',
                'string',
            ],
            'sort' => [
                'nullable',
                'string',
            ],
            'limit' => [
                'nullable',
                'numeric',
            ],
            'offset' => [
                'nullable',
                'numeric',
            ],
            'paginate' => [
                'nullable',
                'numeric',
            ],
            'page' => [
                'nullable',
                'numeric',
            ],
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
