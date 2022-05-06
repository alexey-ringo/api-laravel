<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Domains\Pay\Dto\Response\DataDto\MatchingCampaignResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class MatchingCampaignResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="MatchingCampaignResponseDto",
 *     description="MatchingCampaignResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="The new campaign success create",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="string",
 *         ref="#/components/schemas/MatchingCampaignResponseDataDto",
 *     ),
 * )
 *
 */
class MatchingCampaignResponseDto extends DataTransferObject
{
    public string $status;
    public string $message;
    public MatchingCampaignResponseDataDto|null $data;
}
