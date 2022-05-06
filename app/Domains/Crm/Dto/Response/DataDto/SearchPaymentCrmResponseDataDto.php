<?php

namespace App\Domains\Crm\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SearchPaymentCrmResponseDataDto
 * @package App\Domains\Crm\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="SearchPaymentCrmResponseDataDto",
 *     description="SearchPaymentCrmResponseDataDto",
 *     @OA\Property(
 *         property="sum",
 *         type="number",
 *         example="107403.97",
 *     ),
 *     @OA\Property(
 *         property="full_sum",
 *         type="integer",
 *         example="110222",
 *     ),
 *     @OA\Property(
 *         property="real_sum",
 *         type="number",
 *         example="107403.97",
 *     ),
 *     @OA\Property(
 *         property="count",
 *         type="integer",
 *         example="13",
 *     ),
 * )
 *
 */
class SearchPaymentCrmResponseDataDto extends DataTransferObject
{
    public float $sum;
    public int $full_sum;
    public float $real_sum;
    public int $count;
}
