<?php

namespace App\Http\Requests\Crm;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StatsPaymentCrmRequest
 * @package App\Http\Requests\Crm
 *
 */
class StatsPaymentCrmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cases' => [
                'sometimes',
                'array',
                'min:1',
            ],

            'cases.*' => [
                'required',
                'int',
            ],

            'promo' => [
                'sometimes',
                'array',
                'min:1',
            ],

            'promo.*' => [
                'required',
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
