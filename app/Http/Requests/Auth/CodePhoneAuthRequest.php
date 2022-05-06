<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CodePhoneAuthRequest
 * @package App\Http\Requests
 *
 * @OA\Schema(
 *     title="CodePhoneAuthRequest",
 *     description="CodePhoneAuthRequest",
 *     type="object",
 *     required={"code", "email"},
 *     @OA\Property(
 *         property="code",
 *         description="code",
 *         type="string",
 *         example="1234",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         description="phone",
 *         type="string",
 *         example="79111234567",
 *     ),
 * )
 */
class CodePhoneAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'string',
            ],

            'phone' => [
                'required',
                'string',
            ],
        ];
    }
}
