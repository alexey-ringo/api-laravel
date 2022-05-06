<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\MatchingCampaignResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class SetMatchingCampaignPayTask extends AbstractResourcePayTask
{
    //Dont get from data only - get all response
//    protected string $contentArrayName = 'data';
    protected array $addParams = [
        'status' => 'status',
        'message' => 'message',
    ];
    protected string $apiPath = '/matching/campaign/set';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = MatchingCampaignResponseDto::class;
}
