<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="User Auth user",
 *     description="User Auth request body data",
 *     type="object",
 *     required={"id", "email"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="example@ya.ru",
 *     )
 * )
 *
 */
class UserAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => [
                'required_without:email',
                'integer',
            ],

            'email' => [
                'required_without:id',
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
