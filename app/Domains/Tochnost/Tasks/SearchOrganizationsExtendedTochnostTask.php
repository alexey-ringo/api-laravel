<?php

namespace App\Domains\Tochnost\Tasks;

use App\Domains\Tochnost\Dto\Response\CollectionDto\OrganizationExtendedCollectionTochnostResponseDto;
use App\Domains\Tochnost\Tasks\Base\AbstractResourceTochnostTask;
use App\Parents\Tasks\AbstractTask;

class SearchOrganizationsExtendedTochnostTask extends AbstractResourceTochnostTask
{
    protected string $contentArrayName = 'data';
    protected string $apiPath = '/organizations';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDtoClassName = OrganizationExtendedCollectionTochnostResponseDto::class;
}
