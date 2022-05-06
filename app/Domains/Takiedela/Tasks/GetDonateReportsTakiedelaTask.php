<?php

namespace App\Domains\Takiedela\Tasks;

use App\Domains\Takiedela\Dto\Response\GetDonateReportsTakiedelaResponseDataDto;
use App\Domains\Takiedela\Tasks\Base\AbstractCollectionTakiedelaTask;
use App\Parents\Tasks\AbstractTask;

class GetDonateReportsTakiedelaTask extends AbstractCollectionTakiedelaTask
{
    protected string $apiPath = '/reports';
    protected string $responseDataDtoClassName = GetDonateReportsTakiedelaResponseDataDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
}
