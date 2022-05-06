<?php

namespace App\Domains\Pay\Dto\Response\CollectionDto;

use App\Domains\Pay\Dto\Response\DataDto\PaymentPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;
use function collect;

/**
 * Class PaymentCollectionPayResponseDto
 * @package App\Domains\Pay\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="PaymentCollectionPayResponseDto",
 *     description="PaymentCollectionPayResponseDto",
 *     @OA\Property(
 *         property="count",
 *         type="integer",
 *         example="22",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/PaymentPayResponseDataDto"),
 *     ),
 * )
 *
 */
class PaymentCollectionPayResponseDto extends DataTransferObject
{
//    public string $dataDtoClassName;

    public int $count;

    #[CastWith(CollectionResponseCaster::class, PaymentPayResponseDataDto::class)]
    public Collection $data;

    public function __construct(array $data/*, string $dataDtoClassName*/)
    {
        $data['data'] = $data['data'] ?? collect([]);
//        $this->dataDtoClassName = $dataDtoClassName;
        parent::__construct($data);
    }
}
