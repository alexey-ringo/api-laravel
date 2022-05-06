<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\UserMetricsDonationPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class UserMetricsDonationPayTask extends AbstractResourcePayTask
{
    protected string $extractFromContentName = 'message';
    protected string $contentArrayName = 'message';
    protected array $addParams = [
        'status' => 'status'
    ];
    protected string $apiPath = '/metrics/user';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDtoClassName = UserMetricsDonationPayResponseDto::class;
}
