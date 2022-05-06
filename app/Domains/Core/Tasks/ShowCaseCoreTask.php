<?php

namespace App\Domains\Core\Tasks;

use App\Domains\Core\Dto\Response\ResponseDto\CaseCoreResponseDto;
use App\Domains\Core\Tasks\Base\AbstractResourceCoreTask;
use App\Parents\Tasks\AbstractTask;

class ShowCaseCoreTask extends AbstractResourceCoreTask
{
    protected bool $isOriginalContentWrapped = false;
    protected string $httpType = AbstractTask::GET_TYPE;
    protected string $responseDtoClassName = CaseCoreResponseDto::class;

    public function __construct(string $uuid)
    {
        parent::__construct();
        $this->apiPath = '/nko/v1/cases/' . $uuid;
    }
}
