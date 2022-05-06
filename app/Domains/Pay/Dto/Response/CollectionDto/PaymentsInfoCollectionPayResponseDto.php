<?php

namespace App\Domains\Pay\Dto\Response\CollectionDto;

use App\Domains\Pay\Dto\Response\DataDto\PaymentsInfoPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

/**
 * Class PaymentsInfoCollectionPayResponseDto
 * @package App\Domains\Pay\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="PaymentsInfoCollectionPayResponseDto",
 *     description="PaymentsInfoCollectionPayResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/PaymentsInfoPayResponseDataDto"),
 *     ),
 * )
 *
 */
class PaymentsInfoCollectionPayResponseDto extends DataTransferObject
{
    #[MapFrom('result')]
    #[CastWith(CollectionResponseCaster::class, PaymentsInfoPayResponseDataDto::class)]
    public Collection $data;
}
