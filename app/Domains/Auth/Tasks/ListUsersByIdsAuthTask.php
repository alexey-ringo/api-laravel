<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Tasks\Base\AbstractResourceAuthTask;
use App\Parents\Dto\Response\SimpleArrayDataResponseDto;
use App\Parents\Tasks\AbstractTask;

class ListUsersByIdsAuthTask extends AbstractResourceAuthTask
{
    protected string $apiPath = '/rest/v1/users/list-by-ids';
    protected string $httpType = AbstractTask::GET_TYPE;
    protected string $responseDtoClassName = SimpleArrayDataResponseDto::class;
}
