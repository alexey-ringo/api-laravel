<?php

namespace App\Domains\Tochnost\Dto\Response\CollectionDto;

use App\Domains\Tochnost\Dto\Response\DataDto\OrganizationExtendedTochnostResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class OrganizationExtendedCollectionTochnostResponseDto
 * @package App\Domains\Tochnost\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="OrganizationExtendedCollectionTochnostResponseDto",
 *     description="OrganizationExtendedCollectionTochnostResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/OrganizationExtendedTochnostResponseDataDto"),
 *     ),
 * )
 *
 */
class OrganizationExtendedCollectionTochnostResponseDto extends DataTransferObject
{
    #[CastWith(CollectionResponseCaster::class, OrganizationExtendedTochnostResponseDataDto::class)]
    public Collection $data;
}
