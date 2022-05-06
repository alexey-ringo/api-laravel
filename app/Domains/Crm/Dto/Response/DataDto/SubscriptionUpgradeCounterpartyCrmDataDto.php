<?php

namespace App\Domains\Crm\Dto\Response\DataDto;

use App\Domains\Crm\Dto\Response\Partial\CaseCrmResponseDto;
use App\Domains\Crm\Dto\Response\Partial\SumCrmResponseDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SubscriptionUpgradeCounterpartyCrmDataDto
 * @package App\Domains\Crm\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="SubscriptionUpgradeCounterpartyCrmDataDto",
 *     description="SubscriptionUpgradeCounterpartyCrmDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="212223",
 *     ),
 *     @OA\Property(
 *         property="case",
 *         type="object",
 *         ref="#/components/schemas/CaseCrmResponseDto",
 *     ),
 *     @OA\Property(
 *         property="date_timestamp",
 *         type="string",
 *         example="2015-01-31T14:03:27.000000Z",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="object",
 *         ref="#/components/schemas/SumCrmResponseDto",
 *     ),
 * )
 *
 */
class SubscriptionUpgradeCounterpartyCrmDataDto extends DataTransferObject
{
    public int $id;
    public CaseCrmResponseDto $case;
    public string $date_timestamp;
    public SumCrmResponseDto $sum;
}
