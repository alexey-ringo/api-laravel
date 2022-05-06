<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexSubscriptionPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="IndexSubscriptionPayRequest",
 *     description="IndexSubscriptionPayRequest",
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
class IndexSubscriptionPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'limit' => 'nullable|integer',
            'offset' => 'nullable|integer',
            'active' => 'nullable|boolean_or_string_as_bool',
            'case' => 'nullable|array',
            'name' => 'nullable|string',

        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
