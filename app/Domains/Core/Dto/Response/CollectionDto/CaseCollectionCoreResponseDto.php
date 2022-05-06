<?php

namespace App\Domains\Core\Dto\Response\CollectionDto;

use App\Domains\Core\Dto\Response\DataDto\CaseCoreResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class CaseCollectionCoreResponseDto
 * @package App\Domains\Core\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="CaseCollectionCoreResponseDto",
 *     description="CaseCollectionCoreResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/CaseCoreResponseDataDto"),
 *     ),
 * )
 *
 */
class CaseCollectionCoreResponseDto extends DataTransferObject
{
    #[CastWith(CollectionResponseCaster::class, CaseCoreResponseDataDto::class)]
    public Collection $data;
}
