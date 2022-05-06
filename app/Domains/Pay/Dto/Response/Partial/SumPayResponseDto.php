<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SumPayResponseDto
 * @package App\Domains\Pay\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="SumPayResponseDto",
 *     description="SumPayResponseDto",
 *     @OA\Property(
 *         property="sum",
 *         type="integer",
 *         example="221950",
 *     ),
 *     @OA\Property(
 *         property="real_sum",
 *         type="integer",
 *         example="230000",
 *     ),
 *     @OA\Property(
 *         property="full_sum",
 *         type="integer",
 *         example="230000",
 *     ),
 * )
 */
class SumPayResponseDto extends DataTransferObject
{
    public int $sum;
    public int $real_sum;
    public int $full_sum;
}
