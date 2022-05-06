<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class BalanceMatchingCampaignPayRequestDto extends BasePayRequestDto
{
    public int $campaign_id;
}
