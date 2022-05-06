<?php

namespace App\Domains\Pay\Dto\Response\CollectionDto;

use App\Domains\Pay\Dto\Response\DataDto\MatchingCampaignResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;
use function collect;

/**
 * Class MatchingCampaignCollectionPayResponseDto
 * @package App\Domains\Pay\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="MatchingCampaignCollectionPayResponseDto",
 *     description="MatchingCampaignCollectionPayResponseDto",
 *     @OA\Property(
 *         property="count",
 *         type="integer",
 *         example="22",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/MatchingCampaignResponseDataDto"),
 *     ),
 * )
 *
 */
class MatchingCampaignCollectionPayResponseDto extends DataTransferObject
{
//    public string $status;
    public int $count;

    #[CastWith(CollectionResponseCaster::class, MatchingCampaignResponseDataDto::class)]
    public Collection $data;

    public function __construct(array $data)
    {
        $data['data'] = $data['data'] ?? collect([]);
        parent::__construct($data);
    }
}
