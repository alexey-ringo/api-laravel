<?php

namespace App\Http\Requests\Takiedela;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ChangeEmailSettingAuthRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Change user email",
 *     description="Change user email",
 *     type="object",
 *     required={"post_id"},
 *     @OA\Property(
 *         property="post_id",
 *         type="array",
 *         @OA\Items(
 *             @OA\Property(
 *                 type="integer",
 *             ),
 *         ),
 *     ),
 * )
 *
 */
class SetDonateReportTakiedelaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id' => [
                'required',
                'array',
            ],
        ];
    }
}
