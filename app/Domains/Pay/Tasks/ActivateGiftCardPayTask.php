<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\ActivateGiftCardPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class ActivateGiftCardPayTask extends AbstractResourcePayTask
{
    //    Not wrap in data - $contentArrayName = null;
    protected array $addParams = [
        'status' => 'status',
        'message' => 'message',
    ];
    protected string $apiPath = '/gift/activate';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = ActivateGiftCardPayResponseDto::class;
}
