<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EmailAuthRequest
 * @package App\Http\Requests
 *
 * @OA\Schema(
 *     title="EmailAuthRequest",
 *     description="EmailAuthRequest",
 *     type="object",
 *     required={"email"},
 *     @OA\Property(
 *         property="email",
 *         description="email",
 *         type="string",
 *         example="email@gmail.com",
 *     ),
 * )
 */
class EmailAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
            ],
        ];
    }
}
