<?php

namespace App\Domains\Core\Tasks;

use App\Domains\Core\Dto\Response\CollectionDto\CaseCollectionCoreResponseDto;
use App\Domains\Core\Tasks\Base\AbstractResourceCoreTask;
use App\Parents\Tasks\AbstractTask;

class IndexCaseCoreTask extends AbstractResourceCoreTask
{
    protected string $apiPath = '/nko/v1/cases';
    protected string $httpType = AbstractTask::GET_TYPE;
    protected bool $isOriginalContentWrapped = false;

    protected string $responseDtoClassName = CaseCollectionCoreResponseDto::class;
}
