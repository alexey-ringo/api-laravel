<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CloudPaymentPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="Request CloudPayment Pay",
 *     description="Check Auth request body data",
 *     type="object",
 *     required={"cryptogram", "email", "regular"},
 *     @OA\Property(
 *         property="cryptogram",
 *         description="Bank card cryptogram",
 *         type="string",
 *         example="1A2V2x$d5g6F7s9G10i",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="user email for his id in our base",
 *         type="string",
 *         format="email",
 *         example="example@ya.ru",
 *     ),
 *     @OA\Property(
 *         property="regular",
 *         description="false if once payments, true if subcription",
 *         type="boolean",
 *         example="false",
 *     ),
 *
 *
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
 *         example="45",
 *     ),
 *     @OA\Property(
 *         property="case_id",
 *         description="number of case, fund_id or order_id, default 1",
 *         type="integer",
 *         format="int64",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="comment_id",
 *         description="PS comment id",
 *         type="integer",
 *         format="int64",
 *         example="10",
 *     ),
 *     @OA\Property(
 *         property="matching_company",
 *         description="Mathcing company id",
 *         type="integer",
 *         format="int64",
 *         example="100",
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         description="user id our base",
 *         type="integer",
 *         format="int64",
 *         example="56",
 *     ),
 *     @OA\Property(
 *         property="account_id",
 *         description="account id our base",
 *         type="integer",
 *         format="int64",
 *         example="150",
 *     ),
 *     @OA\Property(
 *         property="startdate",
 *         description="Subcription start date",
 *         type="string",
 *         format="date-time",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="saveCard",
 *         description="If you want to save card",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="rk",
 *         description="Advertising company id",
 *         type="integer",
 *         format="int64",
 *         example="200",
 *     ),
 *     @OA\Property(
 *         property="cardNumber",
 *         description="If you want to save card, add card number",
 *         type="1nteger",
 *         format="int64",
 *         example="1234123412341234",
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
class CloudPaymentPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cryptogram' => 'required|string|max:1000',
            'email' => 'required|email',
            'regular' => 'required|boolean_or_string_as_bool',

            'sum' => 'required|integer',
            'real_sum' => 'nullable|integer',
            'case_id' => 'nullable|integer',
            'comment_id' => 'nullable|integer',
            'matching_company' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'account_id' => 'nullable|integer',
            'startdate' => 'nullable|date',
            'saveCard' => 'nullable|boolean_or_string_as_bool',
            'rk' => 'nullable|integer',
            'cardNumber' => 'required|string',
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
