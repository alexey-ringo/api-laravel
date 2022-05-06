<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SetThreadCommentsRequest
 * @package App\Http\Requests\Comments
 *
 * @OA\Schema(
 *     title="SetThreadCommentsRequest",
 *     description="SetThreadCommentsRequest",
 *     type="object",
 *     required={"user_id", "thread_id"},
 *     @OA\Property(
 *         property="user_id",
 *         description="user id",
 *         type="integer",
 *         format="int64",
 *         example="56",
 *     ),
 *     @OA\Property(
 *         property="thread_id",
 *         description="thread id",
 *         type="integer",
 *         format="int64",
 *         example="102",
 *     ),
 * )
 *
 */
class SetThreadCommentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'thread_id' => 'nullable|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
