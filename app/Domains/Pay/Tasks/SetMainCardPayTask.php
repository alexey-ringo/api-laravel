<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Dto\Response\StatusStringResponseDto;
use App\Parents\Tasks\AbstractTask;

class SetMainCardPayTask extends AbstractResourcePayTask
{
    protected string $apiPath = '/cards/main';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = StatusStringResponseDto::class;
}
