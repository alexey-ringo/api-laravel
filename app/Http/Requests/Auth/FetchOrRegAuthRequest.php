<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FetchOrRegAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Fetch Or Registration new User on Auth request body data",
 *     description="Fetch Or Registration new User on Auth request body data",
 *     type="object",
 *     required={"email"},
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="example@ya.ru",
 *     )
 * )
 *
 */
class FetchOrRegAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
            ],
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
