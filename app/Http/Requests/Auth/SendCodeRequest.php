<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class SendCodeRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="SendCodeRequest",
 *     description="SendCodeRequest",
 *     type="object",
 *     required={"channel"},
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
 *         property="channel",
 *         type="string",
 *         example="phone",
 *     ),
 * )
 */
class SendCodeRequest extends FormRequest
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
                    return isset($this->channel) && $this->channel === 'email';
                }),
                'email',
            ],

            'phone' => [
                Rule::requiredIf(function () {
                    return isset($this->channel) && $this->channel === 'phone';
                }),
                'string'
            ],

            'channel' => [
                'required',
                'string'
            ]
        ];
    }
}
