<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CheckAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Check Auth user",
 *     description="Check Auth request body data",
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
 *     )
 * )
 *
 */
class CheckAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|string|max:100',
            'password' => 'required|string|max:100'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
