<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\AttachCounterpartyCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class AttachCounterpartyCrmTask extends AbstractResourceCrmTask
{
    protected string $responseDtoClassName = AttachCounterpartyCrmResponseDto::class;
    protected bool $isOriginalContentWrapped = false;
    protected string $httpType = AbstractTask::POST_TYPE;

    public function __construct(string $provider)
    {
        parent::__construct();
        $this->apiPath = '/counterparties/attach/' . $provider;
    }
}
