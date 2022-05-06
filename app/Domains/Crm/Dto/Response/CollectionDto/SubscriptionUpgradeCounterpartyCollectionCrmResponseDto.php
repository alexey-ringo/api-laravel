<?php

namespace App\Domains\Crm\Dto\Response\CollectionDto;

use App\Domains\Crm\Dto\Response\DataDto\SubscriptionUpgradeCounterpartyCrmDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use App\Parents\Dto\Cast\CollectionResponseCaster;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class SubscriptionUpgradeCounterpartyCollectionCrmResponseDto
 * @package App\Domains\Crm\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="SubscriptionUpgradeCounterpartyCollectionCrmResponseDto",
 *     description="SubscriptionUpgradeCounterpartyCollectionCrmResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/SubscriptionUpgradeCounterpartyCrmDataDto"),
 *     ),
 *     @OA\Property(
 *         property="uuid",
 *         type="string",
 *         example="1FB55105-C8DA-4C4D-ADB4-AEED83E32CA0",
 *     ),
 *     @OA\Property(
 *         property="state",
 *         type="string",
 *         example="VISITED",
 *     ),
 *     @OA\Property(
 *         property="counterparty",
 *         type="object",
 *         @OA\Property(
 *             property="id",
 *             type="string",
 *             example="0566B1EA-174C-441B-B4ED-C3475A9C66A3",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="builder",
 *         type="object",
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             example="4",
 *         ),
 *         @OA\Property(
 *             property="state",
 *             type="string",
 *             example="SENT",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="views",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="expired",
 *         type="boolean",
 *         example="false",
 *     ),
 * )
 *
 */
class SubscriptionUpgradeCounterpartyCollectionCrmResponseDto extends DataTransferObject
{
    #[CastWith(CollectionResponseCaster::class, SubscriptionUpgradeCounterpartyCrmDataDto::class)]
    public Collection $data;
    public string $uuid;
    public string $state;
    public array $counterparty;
    public array $builder;
    public int $views;
    public bool $expired;
}
