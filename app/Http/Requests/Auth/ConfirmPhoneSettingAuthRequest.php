<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ConfirmPhoneSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Confirmation changed user phone",
 *     description="Confirmation changed user phone",
 *     type="object",
 *     required={"access_token", "code", "phone"},
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="2s?a4df34f23sasdf.s23asdflgw:asdf",
 *     ),
 *     @OA\Property(
 *         property="code",
 *         type="integer",
 *         example="1221",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="79211234567",
 *     )
 * )
 *
 */
class ConfirmPhoneSettingAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'access_token' => [
                'required',
                'string',
            ],

            'code' => [
                'required',
                'integer',
            ],

            'phone' => [
                'required',
                'string',
            ],
        ];
    }
}
