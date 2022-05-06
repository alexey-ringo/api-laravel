<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreUserAuthRequestDto
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="StoreUserAuthRequestDto",
 *     description="StoreUserAuthRequestDto",
 *     type="object",
 *     required={"email"},
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="example@ya.ru",
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         example="Ivan",
 *     ),
 *     @OA\Property(
 *         property="provider",
 *         type="string",
 *         example="telegram",
 *     ),
 *     @OA\Property(
 *         property="social_id",
 *         type="string",
 *         example="123456789",
 *     ),
 * )
 */
class StoreUserAuthRequest extends FormRequest
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
                'max:191',
            ],

            'firstname' => [
                'nullable',
                'string',
                'max:191',
            ],

            'provider' => [
                'required_with:social_id',
                'string',
                'max:40',
            ],

            'social_id' => [
                'required_with:provider',
                'string',
                'max:191',
            ],
        ];
    }
}
