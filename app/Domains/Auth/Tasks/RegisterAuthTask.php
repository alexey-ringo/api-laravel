<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\TokenAuthResponseDataDto;
use App\Domains\Auth\Dto\Response\TokenAuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractDataAuthTask;

class RegisterAuthTask extends AbstractDataAuthTask
{
    protected string $apiPath = '/rest/v1/register';
    protected string $responseDtoClassName = TokenAuthResponseDto::class;
    protected string $responseDataDtoClassName = TokenAuthResponseDataDto::class;
}
