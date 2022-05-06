<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateMetaDataSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Update User Metadata",
 *     description="Update User Metadata",
 *     type="object",
 *     required={"access_token", "lastname", "firstname"},
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="2s?a4df34f23sasdf.s23asdflgw:asdf",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         example="Ivanov",
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         example="Ivan",
 *     )
 * )
 *
 */
class UpdateMetaDataSettingAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'access_token' => [
                'required',
                'string',
            ],

            'lastname' => [
                'required',
                'string',
                'max:255'
            ],

            'firstname' => [
                'required',
                'string',
                'max:255'
            ],

            'patronymic' => [
                'nullable',
                'string',
                'max:255'
            ],

            'birthday' => [
                'nullable',
                'string',
                'max:255'
            ],

            'gender' => [
                'nullable',
                'string',
                'max:255'
            ],

            'country' => [
                'string',
                'max:255'
            ],

            'city' => [
                'nullable',
                'string',
                'max:255'
            ],

            'index' => [
                'nullable',
                'string',
                'max:255'
            ],

            'adress' => [
                'nullable',
                'string',
                'max:255'
            ],

            'avatar' => [
                'nullable',
                'string',
                'max:255'
            ],
        ];
    }
}
