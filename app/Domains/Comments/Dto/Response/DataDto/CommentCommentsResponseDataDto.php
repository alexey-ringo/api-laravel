<?php

namespace App\Domains\Comments\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CommentCommentsResponseDataDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="CommentCommentsResponseDataDto",
 *     description="CommentCommentsResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="122705",
 *     ),
 *     @OA\Property(
 *         property="body",
 *         type="string",
 *         example="Comments text",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="hidden_sum",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="domation",
 *         type="integer",
 *         example="500",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="email@mail.ru",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="+79001234567",
 *     ),
 *     @OA\Property(
 *         property="utm_source",
 *         type="string",
 *         example="some_source",
 *     ),
 *     @OA\Property(
 *         property="utm_medium",
 *         type="string",
 *         example="some_medium",
 *     ),
 *     @OA\Property(
 *         property="utm_campaign",
 *         type="string",
 *         example="some_campaign",
 *     ),
 *     @OA\Property(
 *         property="utm_referer",
 *         type="string",
 *         example="some_referer",
 *     ),
 *     @OA\Property(
 *         property="user_name",
 *         type="string",
 *         example="Александр Юшка",
 *     ),
 *     @OA\Property(
 *         property="user_img",
 *         type="string",
 *         example="user img",
 *     ),
 *     @OA\Property(
 *         property="parent_id",
 *         type="integer",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="thread_id",
 *         type="integer",
 *         example="3904",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2022-01-24T21:01:19.000000Z",
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         example="2022-01-28T14:29:47.000000Z",
 *     ),
 * )
 *
 */
class CommentCommentsResponseDataDto extends DataTransferObject
{
    public int $id;
    public string|null $body;
    public int $status;
    public bool $hidden_sum;
    public int|null $donation;
    public string|null $email;
    public string|null $phone;
    public string|null $utm_source;
    public string|null $utm_medium;
    public string|null $utm_campaign;
    public string|null $utm_referer;
    public string|null $user_name;
    public string|null $user_img;
    public int|null $parent_id;
    public int $thread_id;
    public string $created_at;
    public string $updated_at;
}
