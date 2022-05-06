<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ListPaymentsByIdsPayRequest
 * @package App\Http\Requests\Auth
 *
 */
class ListPaymentsByIdsPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => [
                'required',
                'array',
            ],
            'id.*' => [
                'required',
                'numeric',
            ],
            'simple' => [
                'nullable',
                'boolean',
            ],
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
