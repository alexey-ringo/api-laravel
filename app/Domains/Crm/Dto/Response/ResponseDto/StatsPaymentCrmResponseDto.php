<?php

namespace App\Domains\Crm\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class StatsPaymentCrmResponseDto
 * @package App\Domains\Crm\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="StatsPaymentCrmResponseDto",
 *     description="StatsPaymentCrmResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class StatsPaymentCrmResponseDto extends DataTransferObject
{
    public array $data;
    public array $total;
}
