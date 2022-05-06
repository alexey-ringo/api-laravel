<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CommissionPayResponseDto
 * @package App\Domains\Pqy\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="CommissionPayResponseDto",
 *     description="CommissionPayResponseDto",
 *     @OA\Property(
 *         property="percent",
 *         type="integer",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="string",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="full_sum",
 *         type="string",
 *         example="12",
 *     ),
 * )
 *
 */
class CommissionPayResponseDto extends DataTransferObject
{
    public int $percent;
    public int|string $sum;
    public int|string $full_sum;
}
