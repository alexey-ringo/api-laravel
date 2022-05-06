<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LinkedCardPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="Request for fetching User linked cards",
 *     description="Request for fetching User linked cards",
 *     type="object",
 *     required={"token"},
 *     @OA\Property(
 *         property="token",
 *         type="string",
 *         example="sdf234sdfg3vsed3hr8lhjvfc34g?d!",
 *     ),
 * )
 *
 */
class LinkedCardPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
