<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\BalanceMatchingCampaignPayRequestDto;
use App\Domains\Pay\Tasks\BalanceMatchingCampaignPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class BalanceMatchingCampaignPayAction
{
    private BalanceMatchingCampaignPayTask $balanceMatchingCampaignPayTask;

    public function __construct(BalanceMatchingCampaignPayTask $balanceMatchingCampaignPayTask)
    {
        $this->balanceMatchingCampaignPayTask = $balanceMatchingCampaignPayTask;
    }

    public function run(BalanceMatchingCampaignPayRequestDto $dto): ResourceResponseDto
    {
        return $this->balanceMatchingCampaignPayTask->run($dto);
    }
}
