<?php

namespace App\Domains\Comments\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ThreadCommentsResponseDataDto
 * @package App\Domains\Comments\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="ThreadCommentsResponseDataDto",
 *     description="ThreadCommentsResponseDataDto", *
 *     @OA\Property(
 *         property="thread_id",
 *         type="integer",
 *         example="3904",
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         example="10000",
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
class ThreadCommentsResponseDataDto extends DataTransferObject
{
    public int $thread_id;
    public int $user_id;
    public string $created_at;
    public string $updated_at;
}
