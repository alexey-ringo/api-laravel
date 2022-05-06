<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserMetaAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="UpdateUserMetaAuthRequest",
 *     description="UpdateUserMetaAuthRequest",
 *     type="object",
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         example="Ivan",
 *     ),
 *     @OA\Property(
 *         property="patronymic",
 *         type="string",
 *         example="Vasiylievetch",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         example="Ivanov",
 *     ),
 * )
 */
class UpdateUserMetaAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => [
                'nullable',
                'string',
                'max:191',
            ],

            'patronymic' => [
                'nullable',
                'string',
                'max:191',
            ],

            'lastname' => [
                'nullable',
                'string',
                'max:191',
            ],
        ];
    }
}
