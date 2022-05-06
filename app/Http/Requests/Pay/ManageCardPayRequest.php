<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ManageCardPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="ManageCardPayRequest",
 *     description="ManageCardPayRequest",
 *     type="object",
 *     required={"user_id", "card_id"},
 *     @OA\Property(
 *         property="user_id",
 *         description="user id our base",
 *         type="integer",
 *         format="int64",
 *         example=56,
 *     ),
 *     @OA\Property(
 *         property="card_id",
 *         description="card id our base",
 *         type="integer",
 *         format="int64",
 *         example=15,
 *     ),
 * )
 *
 */
class ManageCardPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'card_id' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
