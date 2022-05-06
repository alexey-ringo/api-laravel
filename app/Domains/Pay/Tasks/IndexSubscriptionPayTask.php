<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\CollectionDto\SubscriptionCollectionPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class IndexSubscriptionPayTask extends AbstractResourcePayTask
{
    protected string $extractFromContentName = 'message';
    protected string $contentArrayName = 'message';
    protected string $subContentArrayName = 'data';
    protected array $addParams = [
        'message' => [
            'count' => 'count',
            'data' => 'data'
        ],
        'status' => 'status'
    ];
    protected string $apiPath = '/subscribtions/get';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDtoClassName = SubscriptionCollectionPayResponseDto::class;
}
