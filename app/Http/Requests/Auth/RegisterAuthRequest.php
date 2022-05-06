<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Register new Auth user",
 *     description="Register Auth request body data",
 *     type="object",
 *     required={"email", "password"},
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="example@ya.ru",
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         example="123456789",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="79212223344",
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         example="Ivan",
 *     ),
 *     @OA\Property(
 *         property="patronymic",
 *         type="string",
 *         example="patronymic",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         example="Ivanov",
 *     ),
 *     @OA\Property(
 *         property="login",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="notification",
 *         type="object",
 *             @OA\Property(
 *                 property="template",
 *                 type="integer",
 *                 example="3",
 *             ),
 *             @OA\Property(
 *                 property="snippets",
 *                 type="array",
 *                 @OA\Items(),
 *             ),
 *     ),
 *     @OA\Property(
 *         property="referer",
 *         type="string",
 *         example="https://domain.ru",
 *     ),
 *     @OA\Property(
 *         property="users",
 *         type="array",
 *         @OA\Items(
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 example="example@ya.ru",
 *             ),
 *             @OA\Property(
 *                 property="password",
 *                 type="string",
 *                 example="123456789",
 *             ),
 *             @OA\Property(
 *                 property="notification",
 *                 type="object",
 *                 @OA\Property(
 *                     property="template",
 *                     type="integer",
 *                     example="3",
 *                 ),
 *                 @OA\Property(
 *                     property="snippets",
 *                     type="array",
 *                     @OA\Items(),
 *                 ),
 *             ),
 *             @OA\Property(
 *                 property="referer",
 *                 type="string",
 *                 example="https://domain.ru",
 *             ),
 *         ),
 *     ),
 * )
 *
 */
class RegisterAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => [
                'bail',
                'string_or_array',
            ],

            'password' => [
                'nullable',
            ],

            'phone' => [
                'nullable',
            ],

            'firstname' => [
                'nullable',
                'string',
            ],

            'patronymic' => [
                'nullable',
                'string',
            ],

            'lastname' => [
                'nullable',
                'string',
            ],

            'notification' => [
                'nullable',
                'array'
            ],

            'notification.template' => [
                'required_with:notification',
                'integer',
            ],

            'notification.snippets' => [
                'nullable',
                'array',
            ],

            'referer' => [
                'nullable',
                'url',
            ],

            'login' => [
                'nullable',
                'boolean'
            ],

            'users' => [
                'nullable',
                'array'
            ],

            'users.*.email' => [
                'required_with:users',
                'bail',
                'email',
                'max:255',
            ],

            'users.*.password' => [
                'nullable',
            ],

            'users.*.notification' => [
                'nullable',
                'array'
            ],

            'users.*.notification.template' => [
                'required_with:users.notification',
                'integer',
                'min:1',
            ],

            'users.*.notification.snippets' => [
                'nullable',
                'array',
            ],

            'users.*.referer' => [
                'nullable',
                'url',
            ],
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
