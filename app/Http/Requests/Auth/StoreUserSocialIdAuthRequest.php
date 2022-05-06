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
 *     required={"provider", "social_id"},
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
class StoreUserSocialIdAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'provider' => [
                'required',
                'string',
                'max:40',
            ],

            'social_id' => [
                'required',
                'string',
                'max:191',
            ],
        ];
    }
}
