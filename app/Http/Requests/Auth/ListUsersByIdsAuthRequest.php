<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ListUsersByIdsAuthRequest
 * @package App\Http\Requests\Auth
 *
 */
class ListUsersByIdsAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids' => [
                'required',
                'array',
            ],
            'ids.*' => [
                'required',
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
