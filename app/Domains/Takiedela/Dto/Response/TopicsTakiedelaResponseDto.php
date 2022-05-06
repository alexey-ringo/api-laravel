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
 *     description="Cases ids and refs on it Response",
 *     @OA\Property(
 *         property="count",
 *         description="count of refs",
 *         type="integer",
 *         example=4,
 *     ),
 *     @OA\Property(
 *         property="data",
 *         description="refs on cases",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/TopicsTakiedelaResponseDataDto"),
 *     ),
 *     @OA\Xml(
 *         name="TopicsTakiedelaResponseDto"
 *     )
 * )
 *
 */
class TopicsTakiedelaResponseDto extends DataTransferObject
{
    public int $count;
    public Collection $data;
}
