<?php

namespace App\Domains\Pay\Dto\Response\CollectionDto;

use App\Domains\Pay\Dto\Response\DataDto\GiftCardPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

/**
 * Class GiftCardCollectionPayResponseDto
 * @package App\Domains\Pay\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="GiftCardCollectionPayResponseDto",
 *     description="GiftCardCollectionPayResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/GiftCardPayResponseDataDto"),
 *     ),
 * )
 *
 */
class GiftCardCollectionPayResponseDto extends DataTransferObject
{
    #[MapFrom('message')]
    #[CastWith(CollectionResponseCaster::class, GiftCardPayResponseDataDto::class)]
    public Collection $data;
}
