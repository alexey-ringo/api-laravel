<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\SearchPaymentCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class SearchPaymentCrmTask extends AbstractResourceCrmTask
{
    protected string $apiPath = '/finance/payments/search';
    protected string $responseDtoClassName = SearchPaymentCrmResponseDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
    protected array $addParams = [
        'data' => 'data',
        'filters' => 'filters'
    ];
}
