<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\UserAuthResponseDataDto;
use App\Domains\Auth\Dto\Response\UserAuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractDataAuthTask;

class StoreUserAuthTask extends AbstractDataAuthTask
{
    protected string $apiPath = '/rest/v1/user/store';
    protected string $responseDtoClassName = UserAuthResponseDto::class;
    protected string $responseDataDtoClassName = UserAuthResponseDataDto::class;
}
