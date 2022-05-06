<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCloudPaymentPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="Request CloudPayment Pay",
 *     description="Check Auth request body data",
 *     type="object",
 *     required={"signup_id", "email", "user_id"},
 *     @OA\Property(
 *         property="signup_id",
 *         description="signup id",
 *         type="integer",
 *         format="int64",
 *         example=123321,
 *     ),
 *     @OA\Property(
 *         property="cryptogram",
 *         description="Bank card cryptogram",
 *         type="string",
 *         example="1A2V2x$d5g6F7s9G10i",
 *     ),
 *     @OA\Property(
 *         property="card_id",
 *         description="user linked card id",
 *         type="integer",
 *         format="int64",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="user email for his id in our base",
 *         type="string",
 *         format="email",
 *         example="example@ya.ru",
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
 *         property="user_id",
 *         description="user id our base",
 *         type="integer",
 *         format="int64",
 *         example=56,
 *     ),
 *     @OA\Property(
 *         property="account_id",
 *         description="account id our base",
 *         type="integer",
 *         format="int64",
 *         example=150,
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
 *         description="Subcription start day",
 *         type="integer",
 *         example="22",
 *     ),
 *     @OA\Property(
 *         property="saveCard",
 *         description="If you want to save card",
 *         type="boolean",
 *         example=false,
 *     ),
 *     @OA\Property(
 *         property="rk",
 *         description="Advertising company id",
 *         type="integer",
 *         format="int64",
 *         example=200,
 *     ),
 *     @OA\Property(
 *         property="cardNumber",
 *         description="If you want to save card, add card number",
 *         type="string",
 *         example="1234 1234 1234 1234",
 *     ),
 *     @OA\Property(
 *         property="cardName",
 *         description="If you want to save card, add card number",
 *         type="string",
 *         example="IVANOV IVAN",
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
class UpdateCloudPaymentPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'signup_id' => 'required|integer',
            'cryptogram' => 'required_without:card_id|string',
            'card_id' => 'required_without:cryptogram|integer',
            'email' => 'required|email',

            'sum' => 'required|integer',
            'real_sum' => 'nullable|integer',
            'case_id' => 'nullable|integer',
            'comment_id' => 'nullable|integer',
            'matching_company' => 'nullable|integer',
            'user_id' => 'required|integer',
            'account_id' => 'nullable|integer',
            'startdate' => 'nullable|date',
            'payday' => 'nullable|integer',
            'saveCard' => 'nullable|boolean_or_string_as_bool',
            'rk' => 'nullable|integer',
            'cardNumber' => 'required_with:cryptogram|string',
            'cardName' => 'required_with:cryptogram|string',
            'site' => 'nullable|string',
            'ref' => 'required_with:cryptogram|string',
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
