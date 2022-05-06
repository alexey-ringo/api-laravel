<?php

namespace App\Domains\Tochnost\Tasks;

use App\Domains\Tochnost\Dto\Response\ClientsSearchOrganizationsTochnostResponseDataDto;
use App\Domains\Tochnost\Tasks\Base\AbstractCollectionTochnostTask;
use App\Parents\Tasks\AbstractTask;

class ClientsSearchOrganizationsTochnostTask extends AbstractCollectionTochnostTask
{
    protected string $apiPath = '/service/organizations/search';
    protected string $responseDataDtoClassName = ClientsSearchOrganizationsTochnostResponseDataDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
    protected string $contentArrayName = 'data';
    protected array $addParams = [
        'total' => 'total'
    ];
}
