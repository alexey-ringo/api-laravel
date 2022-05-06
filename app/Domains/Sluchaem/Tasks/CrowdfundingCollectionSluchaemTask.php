<?php

namespace App\Domains\Sluchaem\Tasks;

use App\Domains\Sluchaem\Dto\CrowdfundingCollectionSluchaemResponseDataDto;
use App\Domains\Sluchaem\Dto\CrowdfundingCollectionSluchaemResponseDto;
use App\Domains\Sluchaem\Tasks\Base\AbstractCollectionSluchaemTask;

class CrowdfundingCollectionSluchaemTask extends AbstractCollectionSluchaemTask
{
    protected string $apiPath = '/Search/PopupCreateEvent';
    protected string $collectionType = 'crowdfunding';
    protected string $responseDataDtoClassName = CrowdfundingCollectionSluchaemResponseDataDto::class;
    protected string $responseDataClassName = CrowdfundingCollectionSluchaemResponseDto::class;
    protected string $ourApiMethodRouteName = 'api.v1.sluchaem.crowdfunding';
}
