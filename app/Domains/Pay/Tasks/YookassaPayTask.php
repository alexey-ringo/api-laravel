<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\RequestYookassaPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class YookassaPayTask extends AbstractResourcePayTask
{
    protected string $apiPath = '/request/yookassa';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = RequestYookassaPayResponseDto::class;
}
