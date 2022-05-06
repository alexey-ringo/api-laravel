<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Dto\Response\EmptyResponseDto;
use App\Parents\Tasks\AbstractTask;

class SyncCounterpartyCrmTask extends AbstractResourceCrmTask
{
    protected string $responseDtoClassName = EmptyResponseDto::class;
    protected string $httpType = AbstractTask::POST_TYPE;

    public function __construct(string $provider)
    {
        parent::__construct();
        $this->apiPath = '/counterparties/sync/' . $provider;
    }
}
