<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class UserMetricsDonationPayResponseDto
 * @package App\Domains\Pqy\Dto\Response
 *
 * @OA\Schema(
 *     title="UserMetricsDonationPayResponseDto",
 *     description="UserMetricsDonationPayResponseDto",
 *     @OA\Property(
 *         property="count_donation",
 *         type="integer",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="count_project",
 *         type="integer",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="string",
 *         example="12",
 *     ),
 * )
 *
 */
class UserMetricsDonationPayResponseDto extends DataTransferObject
{
    public int $count_donation;
    public int $count_project;
    public string $sum;
}
