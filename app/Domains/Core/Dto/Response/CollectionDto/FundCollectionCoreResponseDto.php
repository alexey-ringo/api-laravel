<?php

namespace App\Domains\Core\Dto\Response\CollectionDto;

use App\Domains\Core\Dto\Response\DataDto\FundCoreResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class FundCollectionCoreResponseDto
 * @package App\Domains\Core\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="FundCollectionCoreResponseDto",
 *     description="FundCollectionCoreResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/FundCoreResponseDataDto"),
 *     ),
 * )
 *
 */
class FundCollectionCoreResponseDto extends DataTransferObject
{
    #[CastWith(CollectionResponseCaster::class, FundCoreResponseDataDto::class)]
    public Collection $data;
}
