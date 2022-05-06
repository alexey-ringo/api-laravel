<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\ResponseDto\LoginCodeAuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractResourceAuthTask;
use App\Parents\Tasks\AbstractTask;

class LoginEmailCodeAuthTask extends AbstractResourceAuthTask
{
    protected string $apiPath = '/rest/v1/code/email/login/cookie';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = LoginCodeAuthResponseDto::class;
}
