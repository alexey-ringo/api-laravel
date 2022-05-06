<?php

namespace App\Http\Requests\Crm;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SubscriptionUpgradeCounterpartyCrmRequest
 * @package App\Http\Requests\Crm
 *
 *
 */
class SubscriptionUpgradeCounterpartyCrmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'view' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
