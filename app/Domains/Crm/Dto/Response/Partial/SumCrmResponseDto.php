<?php

namespace App\Domains\Crm\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SumCrmResponseDto
 * @package App\Domains\Crm\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="SumCrmResponseDto",
 *     description="SumCrmResponseDto",
 *     @OA\Property(
 *         property="sum",
 *         type="integer",
 *         example="500",
 *     ),
 *     @OA\Property(
 *         property="real_sum",
 *         type="integer",
 *         example="500",
 *     ),
 *     @OA\Property(
 *         property="upgraded",
 *         type="integer",
 *         example="700",
 *     ),
 * )
 */
class SumCrmResponseDto extends DataTransferObject
{
    public int $sum;
    public int $real_sum;
    public int $upgraded;
}
