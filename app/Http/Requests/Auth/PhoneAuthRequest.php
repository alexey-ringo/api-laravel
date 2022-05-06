<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PhoneAuthRequest
 * @package App\Http\Requests
 *
 * @OA\Schema(
 *     title="PhoneAuthRequest",
 *     description="PhoneAuthRequest",
 *     type="object",
 *     required={"email"},
 *     @OA\Property(
 *         property="phone",
 *         description="phone",
 *         type="string",
 *         example="79111234567",
 *     ),
 * )
 */
class PhoneAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'string',
            ],
        ];
    }
}
