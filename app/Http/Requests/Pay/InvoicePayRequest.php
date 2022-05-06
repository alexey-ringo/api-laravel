<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OfficeSetMatchingCampaignPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="InvoicePayRequest",
 *     description="InvoicePayRequest",
 *     type="object",
 *     required={"id"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="d_123321",
 *     ),
 * )
 *
 */
class InvoicePayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
