<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\CollectionDto\PaymentCollectionPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class IndexPaymentPayTask extends AbstractResourcePayTask
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
    protected string $apiPath = '/payments/get';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDtoClassName = PaymentCollectionPayResponseDto::class;
}
