<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CodeEmailAuthRequest
 * @package App\Http\Requests
 *
 * @OA\Schema(
 *     title="CodeEmailAuthRequest",
 *     description="CodeEmailAuthRequest",
 *     type="object",
 *     required={"code", "email"},
 *     @OA\Property(
 *         property="code",
 *         description="code",
 *         type="string",
 *         example="1234",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="email",
 *         type="string",
 *         example="email@gmail.com",
 *     ),
 * )
 */
class CodeEmailAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
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
