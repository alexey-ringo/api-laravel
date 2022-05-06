<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class UserMetricsMatchingPayResponseDto
 * @package App\Domains\Pqy\Dto\Response
 *
 * @OA\Schema(
 *     title="UserMetricsMatchingPayResponseDto",
 *     description="UserMetricsMatchingPayResponseDto",
 *     @OA\Property(
 *         property="matching_balance",
 *         type="string",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="active_campaigns",
 *         type="string",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="donations_count",
 *         type="string",
 *         example="12",
 *     ),
 * )
 *
 */
class UserMetricsMatchingPayResponseDto extends DataTransferObject
{
    public string $matching_balance;
    public string $active_campaigns;
    public string $donations_count;
}
