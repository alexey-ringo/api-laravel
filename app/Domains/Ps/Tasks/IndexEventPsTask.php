<?php

namespace App\Domains\Ps\Tasks;

use App\Domains\Ps\Dto\Response\EventPsResponseDataDto;
use App\Domains\Ps\Tasks\Base\AbstractCollectionPsTask;
use App\Parents\Tasks\AbstractTask;

class IndexEventPsTask extends AbstractCollectionPsTask
{
    protected string $apiPath = '/events';
    protected string $responseDataDtoClassName = EventPsResponseDataDto::class;
    //GET Method
    protected string $httpType = AbstractTask::GET_TYPE;
}
