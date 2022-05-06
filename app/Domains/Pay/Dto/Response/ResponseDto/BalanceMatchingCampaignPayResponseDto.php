<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class BalanceMatchingCampaignPayResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="BalanceMatchingCampaignPayResponseDto",
 *     description="BalanceMatchingCampaignPayResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Empty campaign id",
 *     ),
 *     @OA\Property(
 *         property="result",
 *         type="number",
 *         format="float",
 *         example="105.4",
 *     ),
 * )
 *
 */
class BalanceMatchingCampaignPayResponseDto extends DataTransferObject
{
    public string $status;
    public string|null $message;
    public float|null $result;
}
