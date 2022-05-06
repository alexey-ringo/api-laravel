<?php

namespace App\Domains\Sluchaem\Tasks;

use App\Domains\Sluchaem\Dto\CaseCollectionSluchaemResponseDataDto;
use App\Domains\Sluchaem\Dto\CaseCollectionSluchaemResponseDto;
use App\Domains\Sluchaem\Tasks\Base\AbstractCollectionSluchaemTask;

class CaseCollectionSluchaemTask extends AbstractCollectionSluchaemTask
{
    protected string $apiPath = '/Search/PopupCreateEvent';
    protected string $collectionType = 'case';
    protected string $responseDataDtoClassName = CaseCollectionSluchaemResponseDataDto::class;
    protected string $responseDataClassName = CaseCollectionSluchaemResponseDto::class;
    protected string $ourApiMethodRouteName = 'api.v1.sluchaem.cases';
}
