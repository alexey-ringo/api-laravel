<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateYookassaPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="UpdateYookassaPayRequest",
 *     description="UpdateYookassaPayRequest",
 *     type="object",
 *     required={"id"},
 *     @OA\Property(
 *         property="id",
 *         description="signup id",
 *         type="integer",
 *         format="int64",
 *         example=123321,
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         description="payment sum, default 50",
 *         type="integer",
 *         format="int64",
 *         example=50,
 *     ),
 *     @OA\Property(
 *         property="real_sum",
 *         description="sum without donor comission",
 *         type="integer",
 *         format="int64",
 *         example=45,
 *     ),
 *     @OA\Property(
 *         property="payday",
 *         description="Subcription start day",
 *         type="integer",
 *         example="22",
 *     ),
 *     @OA\Property(
 *         property="card_id",
 *         description="user linked card id",
 *         type="integer",
 *         format="int64",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="case_id",
 *         description="number of case, fund_id or order_id, default 1",
 *         type="integer",
 *         format="int64",
 *         example=1,
 *     ),
 * )
 *
 */
class UpdateYookassaPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'sum' => 'nullable|integer',
            'real_sum' => 'nullable|integer',
            'payday' => 'nullable|integer',
            'card_id' => 'nullable|integer',
            'case_id' => 'nullable|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
