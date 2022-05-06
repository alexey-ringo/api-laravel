<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\AuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractWithoutDataAuthTask;

class LogoutAuthTask extends AbstractWithoutDataAuthTask
{
    protected string $apiPath = '/rest/v1/logout';
    protected string $responseDtoClassName = AuthResponseDto::class;
}
