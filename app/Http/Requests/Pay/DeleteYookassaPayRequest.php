<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteYookassaPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="DeleteYookassaPayRequest",
 *     description="DeleteYookassaPayRequest",
 *     type="object",
 *     required={"id"},
 *     @OA\Property(
 *         property="id",
 *         description="signup id",
 *         type="integer",
 *         format="int64",
 *         example=123321,
 *     ),
 * )
 *
 */
class DeleteYookassaPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
