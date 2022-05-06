<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCommissionCloudPaymentPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="UpdateCommissionCloudPaymentPayRequest",
 *     description="UpdateCommissionCloudPaymentPayRequest",
 *     type="object",
 *     required={"signup_id", "user_id", "commission"},
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
 *     @OA\Property(
 *         property="commission",
 *         description="commission percent  - step 5",
 *         type="integer",
 *         format="int64",
 *         example=15,
 *     ),
 * )
 *
 */
class UpdateCommissionCloudPaymentPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'signup_id' => 'required|integer',
            'user_id' => 'required|integer',
            'commission' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
