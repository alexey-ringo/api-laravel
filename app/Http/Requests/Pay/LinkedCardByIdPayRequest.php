<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LinkedCardByIdPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="Request for fetching User linked cards",
 *     description="Request for fetching User linked cards",
 *     type="object",
 *     required={"user_id"},
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         example="223322",
 *     ),
 * )
 *
 */
class LinkedCardByIdPayRequest extends FormRequest
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
