<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\TokenAuthResponseDataDto;
use App\Domains\Auth\Dto\Response\TokenAuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractDataAuthTask;

class ShowAuthTokenByUserTask extends AbstractDataAuthTask
{
    protected string $apiPath = '/rest/v1/user/show/token';
    protected string $responseDtoClassName = TokenAuthResponseDto::class;
    protected string $responseDataDtoClassName = TokenAuthResponseDataDto::class;
}
