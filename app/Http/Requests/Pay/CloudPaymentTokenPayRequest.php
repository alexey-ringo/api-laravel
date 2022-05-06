<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CloudPaymentTokenPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="Request CloudPayment with user Token Pay",
 *     description="Request CloudPayment with user Token Pay",
 *     type="object",
 *     required={"token", "card_id", "regular", "sum", "case_id"},
 *     @OA\Property(
 *         property="token",
 *         type="string",
 *         example="sdf234sdfg3vsed3hr8lhjvfc34g?d!",
 *     ),
 *     @OA\Property(
 *         property="card_id",
 *         description="id of selected linked card",
 *         type="integer",
 *         format="int64",
 *         example=150156,
 *     ),
 *     @OA\Property(
 *         property="regular",
 *         description="false if once payments, true if subcription",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="account_id",
 *         description="account id our base",
 *         type="integer",
 *         format="int64",
 *         example=150,
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
 *         property="case_id",
 *         description="number of case, fund_id or order_id, default 1",
 *         type="integer",
 *         format="int64",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="comment_id",
 *         description="PS comment id",
 *         type="integer",
 *         format="int64",
 *         example=10,
 *     ),
 *     @OA\Property(
 *         property="matching_company",
 *         description="Mathcing company id",
 *         type="integer",
 *         format="int64",
 *         example=100,
 *     ),
 *     @OA\Property(
 *         property="startdate",
 *         description="Subcription start date",
 *         type="string",
 *         format="date-time",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="payday",
 *         description="payment Day of the month",
 *         type="integer",
 *         format="int64",
 *         example=30,
 *     ),
 *     @OA\Property(
 *         property="rk",
 *         description="Advertising company id",
 *         type="integer",
 *         format="int64",
 *         example=200,
 *     ),
 *     @OA\Property(
 *         property="site",
 *         description="request author (shop, td, ps or something)",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="ref",
 *         description="request page url",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="cid",
 *         description="user GA id",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="ip",
 *         description="user IP",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         description="user name",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         description="user lastname",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         description="user phone",
 *         type="string",
 *         example="",
 *     ),
 * )
 *
 */
class CloudPaymentTokenPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => 'required|string',
            'card_id' => 'required|integer',

            'regular' => 'required|boolean_or_string_as_bool',
            'account_id' => 'nullable|integer',
            'sum' => 'required|integer',
            'real_sum' => 'nullable|integer',
            'case_id' => 'required|integer',
            'comment_id' => 'nullable|integer',
            'matching_company' => 'nullable|integer',
            'startdate' => 'nullable|date',
            'payday' => 'nullable|integer',
            'rk' => 'nullable|integer',
            'site' => 'nullable|string',
            'ref' => 'nullable|string',
            'cid' => 'nullable|string',
            'ip' => 'nullable|string',
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'phone' => 'nullable|string'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
