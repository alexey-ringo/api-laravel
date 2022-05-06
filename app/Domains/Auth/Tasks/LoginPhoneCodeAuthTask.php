<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\ResponseDto\LoginCodeAuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractResourceAuthTask;
use App\Parents\Tasks\AbstractTask;

class LoginPhoneCodeAuthTask extends AbstractResourceAuthTask
{
    protected string $apiPath = '/rest/v1/code/phone/login/cookie';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = LoginCodeAuthResponseDto::class;
}
