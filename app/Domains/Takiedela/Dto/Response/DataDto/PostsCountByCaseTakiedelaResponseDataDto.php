<?php

namespace App\Domains\Takiedela\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class PostsCountByCaseTakiedelaResponseDataDto
 * @package App\Domains\Takiedela\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="PostsCountByCaseTakiedelaResponseDataDto",
 *     description="PostsCountByCaseTakiedelaResponseDataDto",
 *     @OA\Property(
 *         property="case_id",
 *         type="string",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="articles",
 *         type="integer",
 *         example="2",
 *     ),
 * )
 */
class PostsCountByCaseTakiedelaResponseDataDto extends DataTransferObject
{
    public string $case_id;
    public int $articles;
}
