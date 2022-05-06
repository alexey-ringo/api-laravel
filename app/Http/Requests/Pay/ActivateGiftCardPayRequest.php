<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActivateGiftCardPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="ActivateGiftCardPayRequest",
 *     description="ActivateGiftCardPayRequest",
 *     type="object",
 *     required={"user_id", "code"},
 *     @OA\Property(
 *         property="user_id",
 *         description="user id our base",
 *         type="integer",
 *         format="int64",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="code",
 *         description="gift card code",
 *         type="string",
 *         format="int64",
 *         example="ASD123321DSA",
 *     ),
 * )
 *
 */
class ActivateGiftCardPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'code' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
