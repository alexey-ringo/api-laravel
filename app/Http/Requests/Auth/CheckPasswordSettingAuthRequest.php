<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CheckPasswordSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Check valid current user password",
 *     description="Check valid current user password",
 *     type="object",
 *     required={"access_token", "current_password"},
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="2s?a4df34f23sasdf.s23asdflgw:asdf",
 *     ),
 *     @OA\Property(
 *         property="current_password",
 *         type="string",
 *         example="123QWEasd",
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         example="321EWQdsa",
 *     )
 * )
 *
 */
class CheckPasswordSettingAuthRequest extends FormRequest
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

            'current_password' => [
                'required',
                'string',
            ],

            'password' => [
                'nullable',
                'string',
            ],
        ];
    }
}
