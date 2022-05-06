<?php

namespace App\Domains\Takiedela\Dto\Response\ResponseDto;

use App\Domains\Takiedela\Dto\Response\DataDto\PostsCountByCaseTakiedelaResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class PostsCountByCaseTakiedelaResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="PostsCountByCaseTakiedelaResponseDto",
 *     description="PostsCountByCaseTakiedelaResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/PostsCountByCaseTakiedelaResponseDataDto"),
 *     ),
 * )
 *
 */
class PostsCountByCaseTakiedelaResponseDto extends DataTransferObject
{
    #[CastWith(CollectionResponseCaster::class, PostsCountByCaseTakiedelaResponseDataDto::class)]
    public Collection $data;
}
