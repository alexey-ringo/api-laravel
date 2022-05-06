<?php

namespace App\Domains\Core\Dto\Response\ResponseDto;

use App\Domains\Core\Dto\Response\DataDto\CaseCoreResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CaseCoreResponseDto
 * @package App\Domains\Core\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="CaseCoreResponseDto",
 *     description="CaseCoreResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/CaseCoreResponseDataDto",
 *     ),
 * )
 *
 */
class CaseCoreResponseDto extends DataTransferObject
{
    public CaseCoreResponseDataDto|null $data;
}
