<?php

namespace App\Http\Requests\Crm;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCounterpartyCrmRequest
 * @package App\Http\Requests\Crm
 *
 * @OA\Schema(
 *     title="Request for save Counterparty to CRM",
 *     description="Request for save Counterparty to CRM",
 *     type="object",
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="example@mail.ru",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="79111234567",
 *     ),
 *     @OA\Property(
 *         property="model_type",
 *         type="string",
 *         example="user",
 *     ),
 * )
 *
 */
class SearchCounterpartyCrmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'string',
            'phone' => 'string',
            'model_type' => 'string',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
