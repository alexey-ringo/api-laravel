<?php

namespace App\Domains\Takiedela\Dto\Response\ResponseDto;

use App\Domains\Takiedela\Dto\Response\DataDto\SetDonateReportTakiedelaResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SetDonateReportTakiedelaResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="SetDonateReportTakiedelaResponseDto",
 *     description="SetDonateReportTakiedelaResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/SetDonateReportTakiedelaResponseDto",
 *     ),
 * )
 *
 */
class SetDonateReportTakiedelaResponseDto extends DataTransferObject
{
    public SetDonateReportTakiedelaResponseDataDto|null $data;
}
