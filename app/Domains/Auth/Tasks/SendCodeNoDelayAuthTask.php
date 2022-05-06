<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\AuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractWithoutDataAuthTask;

class SendCodeNoDelayAuthTask extends AbstractWithoutDataAuthTask
{
    protected string $apiPath = '/rest/v1/code-no-delay';
    protected string $responseDtoClassName = AuthResponseDto::class;
}
