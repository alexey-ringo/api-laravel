<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FetchUserAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Request for fetched User from Auth",
 *     description="Request for fetched User from Auth",
 *     type="object",
 *     required={"token"},
 *     @OA\Property(
 *         property="token",
 *         type="string",
 *         example="sdf234sdfg3vsed3hr8lhjvfc34g?d!",
 *     ),
 * )
 *
 */
class FetchUserAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
