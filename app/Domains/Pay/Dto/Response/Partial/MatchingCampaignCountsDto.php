<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class OfficeMatchingCampaignCountsDto
 * @package App\Domains\Pqy\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="OfficeMatchingCampaignCountsDto",
 *     description="OfficeMatchingCampaignCountsDto",
 *     @OA\Property(
 *         property="funds",
 *         type="integer",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="cases",
 *         type="integer",
 *         example="30",
 *     ),
 * )
 *
 */
class MatchingCampaignCountsDto extends DataTransferObject
{
    public int $funds;
    public int $cases;
}
