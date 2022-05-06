<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class FetchUserAuthResourceResponseDto
 * @package App\Domains\Auth\Dto\Response
 */
class FetchUserAuthResourceResponseDto extends DataTransferObject
{
    /**
     * @var int
     */
    public int $statusCode;

    /**
     * @var FetchUserAuthResponseDto
     */
    public FetchUserAuthResponseDto $fetchUserResponseDto;
}
