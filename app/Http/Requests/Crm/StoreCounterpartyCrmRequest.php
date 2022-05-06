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
 *     required={"model_type", "model_id"},
 *     @OA\Property(
 *         property="model_type",
 *         type="string",
 *         example="user",
 *     ),
 *     @OA\Property(
 *         property="model_id",
 *         type="integer",
 *         example="123321",
 *     ),
 * )
 *
 */
class StoreCounterpartyCrmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'model_type' => 'required|string',
            'model_id' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
