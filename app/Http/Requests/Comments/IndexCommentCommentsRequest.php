<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexCommentCommentsRequest
 * @package App\Http\Requests\Comments
 *
 * @OA\Schema(
 *     title="IndexCommentCommentsRequest",
 *     description="IndexCommentCommentsRequest",
 *     type="object",
 *     required={"url", "provider"},
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         example="file.jpg: https://crm.nuzhnapomosh.ru/file.jpg",
 *     ),
 *     @OA\Property(
 *         property="provider",
 *         type="string",
 *         example="Provider",
 *     ),
 *      @OA\Property(
 *         property="meta",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class IndexCommentCommentsRequest extends FormRequest
{
    public function rules()
    {
        return [
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
