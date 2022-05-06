<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreUserAuthRequestDto
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="DeleteUserSocialIdAuthRequest",
 *     description="DeleteUserSocialIdAuthRequest",
 *     type="object",
 *     required={"provider"},
 *     @OA\Property(
 *         property="provider",
 *         type="string",
 *         example="telegram",
 *     ),
 * )
 */
class DeleteUserSocialIdAuthRequest extends FormRequest
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
        ];
    }
}
