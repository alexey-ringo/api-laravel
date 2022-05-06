<?php

namespace App\Domains\Takiedela\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;
use Illuminate\Support\Collection;

/**
 * Class PostsTakiedelaResponseDto
 * @package App\Domains\Takiedela\Dto\Response
 *
 * @OA\Schema(
 *     title="PostsTakiedelaResponseDto",
 *     description="Takiedela Posts Response",
 *     @OA\Property(
 *         property="count",
 *         description="count of Posts",
 *         type="integer",
 *         example=4,
 *     ),
 *     @OA\Property(
 *         property="data",
 *         description="Posts content",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/PostsTakiedelaResponseDataDto"),
 *     ),
 *     @OA\Property(
 *         property="meta",
 *         description="Posts metadata",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class PostsTakiedelaResponseDto extends DataTransferObject
{
    public int $count;
    public Collection $data;
    public object $meta;
}
