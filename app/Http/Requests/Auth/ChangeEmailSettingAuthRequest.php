<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ChangeEmailSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Change user email",
 *     description="Change user email",
 *     type="object",
 *     required={"access_token", "email"},
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="2s?a4df34f23sasdf.s23asdflgw:asdf",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="67@ya.ru",
 *     )
 * )
 *
 */
class ChangeEmailSettingAuthRequest extends FormRequest
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

            'email' => [
                'required',
                'email',
            ],
        ];
    }
}
