<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\SetMatchingCampaignPayRequestDto;
use App\Domains\Pay\Tasks\SetMatchingCampaignPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SetMatchingCampaignPayAction
{
    private SetMatchingCampaignPayTask $officeCreateMatchingCampaignPayTask;

    public function __construct(SetMatchingCampaignPayTask $officeCreateMatchingCampaignPayTask)
    {
        $this->officeCreateMatchingCampaignPayTask = $officeCreateMatchingCampaignPayTask;
    }

    public function run(SetMatchingCampaignPayRequestDto $dto): ResourceResponseDto
    {
        return $this->officeCreateMatchingCampaignPayTask->run($dto);
    }
}
