<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ChangePasswordSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Change user password",
 *     description="Change user password",
 *     type="object",
 *     required={"access_token", "current_password", "password", "confirm_password"},
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
 *     ),
 *     @OA\Property(
 *         property="confirm_password",
 *         type="string",
 *         example="321EWQdsa",
 *     )
 * )
 *
 */
class ChangePasswordSettingAuthRequest extends FormRequest
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
                'required',
                'string',
            ],

            'confirm_password' => [
                'required',
                'string',
            ],
        ];
    }
}
