<?php

namespace App\Domains\Takiedela\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SetDonateReportTakiedelaResponseDataDto
 * @package App\Domains\Takiedela\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="SetDonateReportTakiedelaResponseDataDto",
 *     description="SetDonateReportTakiedelaResponseDataDto",
 *     @OA\Property(
 *         property="count",
 *         type="integer",
 *         example="1",
 *     ),
 * )
 */
class SetDonateReportTakiedelaResponseDataDto extends DataTransferObject
{
    public int $count;
}
