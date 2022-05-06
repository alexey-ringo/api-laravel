<?php

namespace App\Domains\Tochnost\Tasks;

use App\Domains\Tochnost\Dto\Response\SearchProblemsOrganizationsTochnostResponseDataDto;
use App\Domains\Tochnost\Tasks\Base\AbstractCollectionTochnostTask;
use App\Parents\Tasks\AbstractTask;

class SearchProblemsOrganizationsTochnostTask extends AbstractCollectionTochnostTask
{
    protected string $contentArrayName = 'data';
    protected string $apiPath = '/service/organizations/search';
    protected string $responseDataDtoClassName = SearchProblemsOrganizationsTochnostResponseDataDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
}
