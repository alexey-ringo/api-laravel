<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexPaymentPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="IndexPaymentPayRequest",
 *     description="IndexPaymentPayRequest",
 *     type="object",
 *     required={"user_id"},
 *     @OA\Property(
 *         property="user_id",
 *         description="User ID",
 *         type="integer",
 *         example="212223",
 *     ),
 * )
 *
 */
class IndexPaymentPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'type' => 'nullable|boolean_or_string_as_bool',
            'limit' => 'nullable|integer',
            'offset' => 'nullable|integer',
            'filter' => 'nullable|string',
            'search' => 'nullable|string',
            'only_signup' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
