<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\BalanceMatchingCampaignPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class BalanceMatchingCampaignPayTask extends AbstractResourcePayTask
{
    //    Not wrap in data - $contentArrayName = null;
    protected array $addParams = [
        'status' => 'status',
    ];
    protected string $apiPath = '/matching/campaign/get_balance';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = BalanceMatchingCampaignPayResponseDto::class;
}
