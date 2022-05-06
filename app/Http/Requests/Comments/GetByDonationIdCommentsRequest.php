<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class GetByDonationIdCommentsRequest
 * @package App\Http\Requests\Comments
 *
 * @OA\Schema(
 *     title="GetByDonationIdCommentsRequest",
 *     description="GetByDonationIdCommentsRequest",
 *     type="object",
 *     required={"ids"},
 *     @OA\Property(
 *        property="ids",
 *        type="array",
 *        @OA\Items(),
 *    ),
 * )
 *
 */
class GetByDonationIdCommentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
