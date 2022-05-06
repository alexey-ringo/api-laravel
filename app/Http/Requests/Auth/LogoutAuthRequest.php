<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LogoutAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Logout Auth user",
 *     description="Logout Auth request body data",
 *     type="object",
 *     required={"user_id"},
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         example="1",
 *     )
 * )
 *
 */
class LogoutAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
