<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\StatsPaymentCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class StatsPaymentCrmTask extends AbstractResourceCrmTask/*AbstractCollectionCrmTask*/
{
//    protected string $contentArrayName = 'data';
    protected string $apiPath = '/finance/payments/stats';
//    protected string $resourceCollectionClassName = ResourceAdditionalCollectionDto::class;
//    protected string $responseDataDtoClassName = StatsPaymentCrmResponseDataDto::class;
    protected string $responseDtoClassName = StatsPaymentCrmResponseDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
//    protected array $addParams = [
//        'additional' => 'additional'
//    ];
}
