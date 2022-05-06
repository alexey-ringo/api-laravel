<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateCommentCommentsRequest
 * @package App\Http\Requests\Comments
 *
 * @OA\Schema(
 *     title="CreateCommentCommentsRequest",
 *     description="CreateCommentCommentsRequest",
 *     type="object",
 *     required={"email", "project", "resource_type", "resource_id"},
 *     @OA\Property(
 *         property="body",
 *         description="comment text",
 *         type="string",
 *         example="comment text",
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         description="user id",
 *         type="integer",
 *         format="int64",
 *         example="56",
 *     ),
 *     @OA\Property(
 *         property="parent_id",
 *         description="parent user id",
 *         type="integer",
 *         format="int64",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="user email",
 *         type="string",
 *         example="test@email.ru",
 *     ),
 *     @OA\Property(
 *         property="first_name",
 *         description="first name",
 *         type="string",
 *         example="first name",
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         description="last name",
 *         type="string",
 *         example="first_name",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         description="phone",
 *         type="string",
 *         example="+79001234567",
 *     ),
 *     @OA\Property(
 *         property="donation_id",
 *         description="donation id",
 *         type="integer",
 *         format="int64",
 *         example="345",
 *     ),
 *     @OA\Property(
 *         property="utm_source",
 *         description="utm_source",
 *         type="string",
 *         example="some_source",
 *     ),
 *     @OA\Property(
 *         property="utm_medium",
 *         description="utm_medium",
 *         type="string",
 *         example="some_medium",
 *     ),
 *     @OA\Property(
 *         property="utm_campaign",
 *         description="utm_campaign",
 *         type="string",
 *         example="some_campaign",
 *     ),
 *     @OA\Property(
 *         property="utm_referer",
 *         description="utm_referer",
 *         type="string",
 *         example="some_referer",
 *     ),
 *     @OA\Property(
 *         property="project",
 *         description="project",
 *         type="string",
 *         example="ps",
 *     ),
 *     @OA\Property(
 *         property="resource_type",
 *         description="resource type",
 *         type="string",
 *         example="collection",
 *     ),
 *     @OA\Property(
 *         property="resource_id",
 *         description="resource id",
 *         type="integer",
 *         format="int64",
 *         example="10000",
 *     ),
 * )
 *
 */
class CreateCommentCommentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'body' => 'nullable|string',
            'user_id' => 'nullable|integer',
            'parent_id' => 'nullable|integer',
            'donation_id' => 'nullable|integer',
            'email' => 'required|string',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'phone' => 'nullable|string',
            'hidden_sum' => 'nullable|boolean',
            'utm_source' => 'nullable|string',
            'utm_medium' => 'nullable|string',
            'utm_campaign' => 'nullable|string',
            'utm_referer' => 'nullable|string',
            'project' => 'required|string',
            'resource_type' => 'required|string',
            'resource_id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
