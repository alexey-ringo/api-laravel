<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Dto\Response\StatusStringResponseDataDto;
use App\Parents\Tasks\AbstractTask;

class SetMatchingOrganizationPayTask extends AbstractResourcePayTask
{
//    Not wrap in data - $contentArrayName = null;
    protected array $addParams = [
        'status' => 'status',
        'message' => 'message',
    ];
    protected string $apiPath = '/matching/setorg';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = StatusStringResponseDataDto::class;
}
