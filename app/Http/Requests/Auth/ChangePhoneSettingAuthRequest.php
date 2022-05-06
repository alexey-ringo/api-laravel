<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ChangePhoneSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Change user phone",
 *     description="Change user phone",
 *     type="object",
 *     required={"access_token", "phone"},
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="2s?a4df34f23sasdf.s23asdflgw:asdf",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="79211234567",
 *     )
 * )
 *
 */
class ChangePhoneSettingAuthRequest extends FormRequest
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

            'phone' => [
                'required',
                'string',
            ],
        ];
    }
}
