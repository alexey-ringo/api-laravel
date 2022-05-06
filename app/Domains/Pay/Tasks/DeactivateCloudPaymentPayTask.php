<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\CloudPaymentPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class DeactivateCloudPaymentPayTask extends AbstractResourcePayTask
{
    protected string $apiPath = '/subscribtions/cp/deactivate';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = CloudPaymentPayResponseDto::class;
}
