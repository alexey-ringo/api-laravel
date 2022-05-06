<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\IndexMatchingCampaignPayRequestDto;
use App\Domains\Pay\Tasks\IndexMatchingCampaignPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class IndexMatchingCampaignPayAction
{
    private IndexMatchingCampaignPayTask $indexMatchingCampaignPayTask;

    public function __construct(IndexMatchingCampaignPayTask $indexMatchingCampaignPayTask)
    {
        $this->indexMatchingCampaignPayTask = $indexMatchingCampaignPayTask;
    }

    public function run(IndexMatchingCampaignPayRequestDto $dto): ResourceResponseDto
    {
        return $this->indexMatchingCampaignPayTask->run($dto);
    }
}
