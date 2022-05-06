<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateAllSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Update All User setting data",
 *     description="Update All User setting data",
 *     type="object",
 *     required={"access_token", "lastname", "firstname", "email"},
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="2s?a4df34f23sasdf.s23asdflgw:asdf",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         example="Ivanov",
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         example="Ivan",
 *     ),
 *     @OA\Property(
 *         property="patronymic",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="birthday",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="gender",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="67@ya.ru",
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         example="Россия",
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="index",
 *         type="string",
 *         example="197350",
 *     ),
 *     @OA\Property(
 *         property="adress",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="current_password",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="one_password",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="two_password_confirm",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 *     @OA\Property(
 *         property="avatar",
 *         type="string",
 *         example="Vasiyelyevitch",
 *     ),
 * )
 *
 */
class UpdateAllSettingAuthRequest extends FormRequest
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

            'lastname' => [
                'required',
                'string',
                'max:255'
            ],

            'firstname' => [
                'required',
                'string',
                'max:255'
            ],

            'patronymic' => [
                'nullable',
                'string',
                'max:255'
            ],

            'birthday' => [
                'nullable',
                'string',
                'max:255'
            ],

            'gender' => [
                'nullable',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email'
            ],

            'country' => [
                'string',
                'max:255'
            ],

            'city' => [
                'nullable',
                'string',
                'max:255'
            ],

            'index' => [
                'nullable',
                'string',
                'max:255'
            ],

            'adress' => [
                'nullable',
                'string',
                'max:255'
            ],

            'current_password' => [
                'nullable',
                'string',
                'max:255'
            ],

            'one_password' => [
                'nullable',
                'string',
                'max:255'
            ],

            'two_password_confirm' => [
                'nullable',
                'string',
                'max:255'
            ],

            'avatar' => [
                'nullable',
                'string',
                'max:255'
            ],
        ];
    }
}
