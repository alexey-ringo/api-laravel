<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Dto\Response\StatusStringResponseDto;
use App\Parents\Tasks\AbstractTask;

class DeleteCardPayTask extends AbstractResourcePayTask
{
    protected string $apiPath = '/cards/delete';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = StatusStringResponseDto::class;
}
