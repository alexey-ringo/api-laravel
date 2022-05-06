<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class HistoryGiftCardsPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="HistoryGiftCardsPayRequest",
 *     description="HistoryGiftCardsPayRequest",
 *     type="object",
 *     required={"user_id"},
 *     @OA\Property(
 *         property="user_id",
 *         description="user id our base",
 *         type="integer",
 *         format="int64",
 *         example="123321",
 *     ),
 * )
 *
 */
class HistoryGiftCardsPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
