<?php

namespace App\Domains\Crm\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class StatsPaymentCrmResponseDataDto
 * @package App\Domains\Crm\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="StatsPaymentCrmResponseDataDto",
 *     description="StatsPaymentCrmResponseDataDto",
 *     @OA\Property(
 *         property="case_id",
 *         type="integer",
 *         example="12",
 *     ),
 *     @OA\Property(
 *         property="donors",
 *         type="integer",
 *         example="223344",
 *     ),
 *     @OA\Property(
 *         property="donates",
 *         type="integer",
 *         example="123456789",
 *     ),
 * )
 *
 */
class StatsPaymentCrmResponseDataDto extends DataTransferObject
{
    public int $case_id;
    public int $donors;
    public int $donates;
}
