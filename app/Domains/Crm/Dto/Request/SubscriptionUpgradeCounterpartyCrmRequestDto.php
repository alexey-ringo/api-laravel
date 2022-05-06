<?php

namespace App\Domains\Crm\Dto\Request;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;

class SubscriptionUpgradeCounterpartyCrmRequestDto extends BaseCrmRequestDto
{
    public string|null $view;
}
