<?php

namespace App\Http\Requests\Crm;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreVirtualAccountCrmRequest
 * @package App\Http\Requests\Crm
 *
 * @OA\Schema(
 *     title="Request for save Virtual Account to CRM",
 *     description="Request for save Virtual Account to CRM",
 *     type="object",
 *     required={"case_id"},
 *     @OA\Property(
 *         property="case_id",
 *         type="integer",
 *         example="123456",
 *     ),
 *     @OA\Property(
 *         property="payment_type",
 *         type="integer",
 *         example="123",
 *     ),
 *     @OA\Property(
 *         property="payment_subtype",
 *         type="integer",
 *         example="456",
 *     ),
 * )
 *
 */
class StoreVirtualAccountCrmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'case_id' => 'required|integer',
            'payment_type' => 'integer',
            'payment_subtype' => 'integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
