<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class YookassaPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="Request Yookassa Pay",
 *     description="Check Auth request body data",
 *     type="object",
 *     required={"action", "email"},
 *     @OA\Property(
 *         property="action",
 *         description="Payment type - sberbank, alfabank, yoo_money",
 *         type="string",
 *         example="yoo_money",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="user email for his id in our base",
 *         type="string",
 *         format="email",
 *         example="example@ya.ru",
 *     ),
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
 *         property="ga",
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
class YookassaPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'action' => 'required|string|max:100',
            'email' => 'required|email',

            'sum' => 'integer',
            'real_sum' => 'integer',
            'case_id' => 'integer',
            'comment_id' => 'integer',
            'matching_company' => 'integer',
            'site' => 'string',
            'ref' => 'string',
            'ga' => 'string',
            'ip' => 'string',
            'firstname' => 'string',
            'lastname' => 'string',
            'phone' => 'string'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
