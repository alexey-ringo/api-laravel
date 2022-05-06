<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ConfirmAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Confirm Auth user",
 *     description="Confirm Auth request body data",
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
class ConfirmAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|string|max:100'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
