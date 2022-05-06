<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateUserAuthAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="UpdateUserAuthAuthRequest",
 *     description="UpdateUserAuthAuthRequest",
 *     type="object",
 *     required={"update_type"},
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="example@ya.ru",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="79212223344",
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
 *     @OA\Property(
 *         property="email_verified",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="phone_verified",
 *         type="phone",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="update_type",
 *         type="string",
 *         example="phone_verified",
 *     ),
 * )
 */
class UpdateUserAuthAuthRequest extends FormRequest
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
                Rule::requiredIf(function () {
                    return $this->update_type == 'email';
                }),
                'email',
                'max:191',
            ],

            'phone' => [
                Rule::requiredIf(function () {
                    return $this->update_type == 'phone';
                }),
                'string',
                'max:40',
            ],

            'provider' => [
                Rule::requiredIf(function () {
                    return $this->update_type == 'social';
                }),
                'string',
                'max:40',
            ],

            'social_id' => [
                'required_with:provider',
                'string',
                'max:191',
            ],

            'email_verified' => [
                Rule::requiredIf(function () {
                    return $this->update_type == 'email_verified';
                }),
                'boolean',
            ],

            'phone_verified' => [
                Rule::requiredIf(function () {
                    return $this->update_type == 'phone_verified';
                }),
                'boolean',
            ],

            'update_type' => [
                'required',
                'string',
            ],
        ];
    }
}
