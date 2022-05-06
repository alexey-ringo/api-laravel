<?php

namespace App\Domains\Pay\Dto\Response\CollectionDto;

use App\Domains\Pay\Dto\Response\DataDto\LinkedCardPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class LinkedCardCollectionPayResponseDto
 * @package App\Domains\Pay\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="LinkedCardCollectionPayResponseDtoo",
 *     description="LinkedCardCollectionPayResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Cards list empty",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/LinkedCardPayResponseDataDto"),
 *     ),
 * )
 *
 */
class LinkedCardCollectionPayResponseDto extends DataTransferObject
{
    public string $status;
    public string|null $message;

    #[CastWith(CollectionResponseCaster::class, LinkedCardPayResponseDataDto::class)]
    public Collection|null $data;

    public function __construct(array $data)
    {
        if (isset($data['message']) && is_array($data['message'])) {
            $data['data'] = $data['message'];
            $data['message'] = null;
        }
        parent::__construct($data);
    }
}
