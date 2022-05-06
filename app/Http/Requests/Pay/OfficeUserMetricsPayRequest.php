<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OfficeUserMetricsPayRequest
 * @package App\Http\Requests\Pay
 *
 */
class OfficeUserMetricsPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'type' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
