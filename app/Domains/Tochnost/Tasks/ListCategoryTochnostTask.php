<?php

namespace App\Domains\Tochnost\Tasks;

use App\Domains\Tochnost\Dto\Response\ListCategoryTochnostResponseDto;
use App\Domains\Tochnost\Tasks\Base\AbstractCollectionTochnostTask;
use App\Parents\Tasks\AbstractTask;

class ListCategoryTochnostTask extends AbstractCollectionTochnostTask
{
    protected string $apiPath = '/service/lists/category';
    protected string $responseDataDtoClassName = ListCategoryTochnostResponseDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
}
