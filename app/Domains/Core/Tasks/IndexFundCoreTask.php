<?php

namespace App\Domains\Core\Tasks;

use App\Domains\Core\Dto\Response\CollectionDto\FundCollectionCoreResponseDto;
use App\Domains\Core\Tasks\Base\AbstractResourceCoreTask;
use App\Parents\Tasks\AbstractTask;

class IndexFundCoreTask extends AbstractResourceCoreTask
{
    protected string $apiPath = '/nko/v1/fund';
    protected string $httpType = AbstractTask::GET_TYPE;
    protected bool $isOriginalContentWrapped = false;

    protected string $responseDtoClassName = FundCollectionCoreResponseDto::class;
}
