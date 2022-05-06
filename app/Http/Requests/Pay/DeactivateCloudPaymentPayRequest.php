<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeactivateCloudPaymentPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="DeactivateCloudPaymentPayRequest",
 *     description="DeactivateCloudPaymentPayRequest",
 *     type="object",
 *     required={"signup_id", "user_id"},
 *     @OA\Property(
 *         property="signup_id",
 *         description="signup id",
 *         type="integer",
 *         format="int64",
 *         example=123321,
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         description="user id our base",
 *         type="integer",
 *         format="int64",
 *         example=56,
 *     ),
 * )
 *
 */
class DeactivateCloudPaymentPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'signup_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
