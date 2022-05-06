<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\YookassaPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class RestoreYookassaPayTask extends AbstractResourcePayTask
{
    protected array $addParams = [
        'status' => 'status',
        'message' => 'message'
    ];
    protected string $apiPath = '/subscribtions/yookassa/restore';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = YookassaPayResponseDto::class;
}
