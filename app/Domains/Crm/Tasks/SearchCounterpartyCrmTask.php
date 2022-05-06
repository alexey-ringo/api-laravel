<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\CounterpartyCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class SearchCounterpartyCrmTask extends AbstractResourceCrmTask
{
    protected string $contentArrayName = 'data';
    protected string $apiPath = '/counterparties/search';
    protected string $responseDtoClassName = CounterpartyCrmResponseDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
}
