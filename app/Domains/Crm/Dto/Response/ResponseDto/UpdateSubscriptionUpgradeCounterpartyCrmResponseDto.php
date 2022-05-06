<?php

namespace App\Domains\Crm\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class UpdateSubscriptionUpgradeCounterpartyCrmResponseDto
 * @package App\Domains\Crm\Dto\Response\CollectionDto
 *
 * @OA\Schema(
 *     title="UpdateSubscriptionUpgradeCounterpartyCrmResponseDto",
 *     description="UpdateSubscriptionUpgradeCounterpartyCrmResponseDto",
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
class UpdateSubscriptionUpgradeCounterpartyCrmResponseDto extends DataTransferObject
{
    public string $uuid;
    public string $state;
    public array $counterparty;
    public array $builder;
    public int $views;
    public bool $expired;
}
