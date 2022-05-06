<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SetMatchingOrganizationPayRequest
 * @package App\Http\Requests\Pay
 *
 */
class SetMatchingOrganizationPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'name' => 'nullable|string',
            'logo' => 'nullable|string',
            'inn' => 'required|string',
            'kpp' => 'nullable|string',
            'bik' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'account_correspondent' => 'nullable|string',
            'account_checking' => 'nullable|string',
            'bank_address' => 'nullable|string',
            'person' => 'nullable|string',
            'email' => 'required|string',
            'phone' => 'nullable|string',
            'status' => 'nullable|string',
            'flags' => 'nullable|string',
            'tags' => 'nullable|string',
            'sum' => 'nullable|integer'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
