<?php

namespace App\Domains\Crm\Dto\Response\ResponseDto;

use App\Domains\Crm\Dto\Response\DataDto\CounterpartyCrmResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CounterpartyCrmResponseDto
 * @package App\Domains\Pqy\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="CounterpartyCrmResponseDto",
 *     description="CounterpartyCrmResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/CounterpartyCrmResponseDataDto",
 *     ),
 * )
 *
 */
class CounterpartyCrmResponseDto extends DataTransferObject
{
    public CounterpartyCrmResponseDataDto $data;
}
