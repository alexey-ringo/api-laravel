<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Dto\Response\StatusStringResponseDto;
use App\Parents\Tasks\AbstractTask;

class DeleteYookassaPayTask extends AbstractResourcePayTask
{
//    protected string $contentArrayName = '';
    protected array $addParams = [
        'status' => 'status',
        'message' => 'message'
    ];
    protected string $apiPath = '/subscribtions/yookassa/deactivate';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = StatusStringResponseDto::class;
}
