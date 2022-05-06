<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\CounterpartyCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class ShowCounterpartyCrmTask extends AbstractResourceCrmTask
{
    protected string $contentArrayName = 'data';
    protected string $responseDtoClassName = CounterpartyCrmResponseDto::class;
    //GET Method
    protected string $httpType = AbstractTask::GET_TYPE;

    public function __construct(string $uuid)
    {
        parent::__construct();
        $this->apiPath = '/counterparties/' . $uuid;
    }
}
