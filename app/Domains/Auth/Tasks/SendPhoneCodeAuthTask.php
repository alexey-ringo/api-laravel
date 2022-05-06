<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Tasks\Base\AbstractResourceAuthTask;
use App\Parents\Dto\Response\StatusBoolResponseDto;
use App\Parents\Tasks\AbstractTask;

class SendPhoneCodeAuthTask extends AbstractResourceAuthTask
{
    protected string $apiPath = '/rest/v1/code/phone/send';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = StatusBoolResponseDto::class;
}
