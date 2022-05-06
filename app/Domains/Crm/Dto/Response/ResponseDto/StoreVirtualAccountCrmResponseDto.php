<?php

namespace App\Domains\Crm\Dto\Response\ResponseDto;

use App\Domains\Crm\Dto\Response\DataDto\StoreVirtualAccountCrmResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class StoreVirtualAccountCrmResponseDto
 * @package App\Domains\Pqy\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="StoreVirtualAccountCrmResponseDto",
 *     description="StoreVirtualAccountCrmResponseDto",
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/StoreVirtualAccountCrmResponseDataDto",
 *     ),
 * )
 *
 */
class StoreVirtualAccountCrmResponseDto extends DataTransferObject
{
    public StoreVirtualAccountCrmResponseDataDto $data;
}
