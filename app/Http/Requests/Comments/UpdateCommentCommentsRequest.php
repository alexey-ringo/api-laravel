<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCommentCommentsRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="UpdateCommentCommentsRequest",
 *     description="UpdateCommentCommentsRequest",
 *     type="object",
 *     required={"body"},
 *     @OA\Property(
 *         property="body",
 *         description="comment text",
 *         type="string",
 *         example="comment text",
 *     ),
 * )
 *
 */
class UpdateCommentCommentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'body' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
