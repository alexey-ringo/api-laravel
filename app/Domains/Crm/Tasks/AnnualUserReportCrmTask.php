<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\AnnualUserReportCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class AnnualUserReportCrmTask extends AbstractResourceCrmTask
{
    protected string $contentArrayName = 'data';
    protected string $responseDtoClassName = AnnualUserReportCrmResponseDto::class;
    //GET Method
    protected string $httpType = AbstractTask::GET_TYPE;

    public function __construct(string $uuid)
    {
        parent::__construct();
        $this->apiPath = '/reports/annual-user-report/' . $uuid;
    }
}
