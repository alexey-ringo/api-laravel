<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OfficeShowMatchingCampaignPayRequest
 * @package App\Http\Requests\Pay
 *
 */
class IndexMatchingCampaignPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|numeric',
            'status' => 'nullable|array',
            'limit' => 'nullable|integer',
            'offset' => 'nullable|integer',
            'data_from' => 'nullable|date',
            'data_to' => 'nullable|date',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
