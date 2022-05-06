<?php

namespace App\Domains\Crm\Dto\Response\ResponseDto;

use App\Domains\Crm\Dto\Response\DataDto\AnnualUserReportCrmResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class AnnualUserReportCrmResponseDto
 * @package App\Domains\Pqy\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="AnnualUserReportCrmResponseDto",
 *     description="AnnualUserReportCrmResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/AnnualUserReportCrmResponseDataDto",
 *     ),
 * )
 *
 */
class AnnualUserReportCrmResponseDto extends DataTransferObject
{
    public AnnualUserReportCrmResponseDataDto $data;
}
