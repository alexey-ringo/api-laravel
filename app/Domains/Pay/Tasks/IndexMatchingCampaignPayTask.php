<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\CollectionDto\MatchingCampaignCollectionPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class IndexMatchingCampaignPayTask extends AbstractResourcePayTask
{
    protected string $contentArrayName = 'data';
    protected array $addParams = [
        'status' => 'status',
        'count' => 'count'
    ];
    protected string $apiPath = '/matching/getcampaigns';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDtoClassName = MatchingCampaignCollectionPayResponseDto::class;
}
