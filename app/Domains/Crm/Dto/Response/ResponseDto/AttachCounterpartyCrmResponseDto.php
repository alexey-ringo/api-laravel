<?php

namespace App\Domains\Crm\Dto\Response\ResponseDto;

use App\Domains\Crm\Dto\Response\DataDto\AttachCounterpartyCrmResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class AttachCounterpartyCrmResponseDto
 * @package App\Domains\Pqy\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="AttachCounterpartyCrmResponseDto",
 *     description="AttachCounterpartyCrmResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/AttachCounterpartyCrmResponseDataDto",
 *     ),
 * )
 *
 */
class AttachCounterpartyCrmResponseDto extends DataTransferObject
{
    public AttachCounterpartyCrmResponseDataDto $data;
}
