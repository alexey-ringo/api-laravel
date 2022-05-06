<?php

namespace App\Http\Requests\Takiedela;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PostsCountByCaseTakiedelaRequest
 * @package App\Http\Requests\Auth
 *
 * @OA\Schema(
 *     title="Count Post by Case",
 *     description="Count Post by Case",
 *     type="object",
 *     required={"case_id"},
 *     @OA\Property(
 *         property="case_id",
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
class PostsCountByCaseTakiedelaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'case_id' => [
                'required',
                'array',
            ],
        ];
    }
}
