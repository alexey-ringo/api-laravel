<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OfficeShowMatchingOrganizationPayRequest
 * @package App\Http\Requests\Pay
 *
 */
class ShowMatchingOrganizationPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
