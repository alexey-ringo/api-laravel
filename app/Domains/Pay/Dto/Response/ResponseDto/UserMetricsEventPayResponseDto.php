<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class OfficeUserMetricsEventPayResponseDataDto
 * @package App\Domains\Pqy\Dto\Response
 *
 * @OA\Schema(
 *     title="OfficeUserMetricsEventPayResponseDataDto",
 *     description="OfficeUserMetricsEventPayResponseDataDto",
 *     @OA\Property(
 *         property="events_count",
 *         type="integer",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="actions_count",
 *         type="integer",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="total_sum",
 *         type="string",
 *         example="12",
 *     ),
 * )
 *
 */
class UserMetricsEventPayResponseDto extends DataTransferObject
{
    public int $events_count;
    public int $actions_count;
    public string $total_sum;
}
