<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\YookassaPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class UpdateYookassaPayTask extends AbstractResourcePayTask
{
//    protected string $contentArrayName = '';
    protected array $addParams = [
        'status' => 'status',
        'message' => 'message'
    ];
    protected string $apiPath = '/subscribtions/yookassa/update';
    protected string $httpType = AbstractTask::POST_TYPE;
    protected string $responseDtoClassName = YookassaPayResponseDto::class;
}
