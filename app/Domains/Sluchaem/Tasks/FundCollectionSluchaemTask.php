<?php

namespace App\Domains\Sluchaem\Tasks;

use App\Domains\Sluchaem\Dto\FundCollectionSluchaemResponseDataDto;
use App\Domains\Sluchaem\Dto\FundCollectionSluchaemResponseDto;
use App\Domains\Sluchaem\Tasks\Base\AbstractCollectionSluchaemTask;

class FundCollectionSluchaemTask extends AbstractCollectionSluchaemTask
{
    protected string $apiPath = '/Search/PopupCreateEvent';
    protected string $collectionType = 'fund';
    protected string $responseDataDtoClassName = FundCollectionSluchaemResponseDataDto::class;
    protected string $responseDataClassName = FundCollectionSluchaemResponseDto::class;
    protected string $ourApiMethodRouteName = 'api.v1.sluchaem.funds';
}
