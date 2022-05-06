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
 *     required={"cryptogram", "email", "user_id", "cardNumber", "cardName", "ref"},
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
 *         property="user_id",
 *         description="user id our base",
 *         type="integer",
 *         format="int64",
 *         example=56,
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
 *         example="<redirect link>",
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
class CreateCardPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cryptogram' => 'required|string',
            'email' => 'required|email',
            'user_id' => 'required|integer',
            'cardNumber' => 'required|string',
            'cardName' => 'required|string',
            'site' => 'nullable|string',
            'ref' => 'required|string',
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
