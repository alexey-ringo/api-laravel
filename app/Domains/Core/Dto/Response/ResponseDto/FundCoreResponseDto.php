<?php

namespace App\Domains\Core\Dto\Response\ResponseDto;

use App\Domains\Core\Dto\Response\DataDto\FundCoreResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class FundCoreResponseDto
 * @package App\Domains\Core\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="FundCoreResponseDto",
 *     description="FundCoreResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/FundCoreResponseDataDto",
 *     ),
 * )
 *
 */
class FundCoreResponseDto extends DataTransferObject
{
    public FundCoreResponseDataDto|null $data;
}
