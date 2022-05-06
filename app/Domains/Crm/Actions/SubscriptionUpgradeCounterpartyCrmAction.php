<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Tasks\SubscriptionUpgradeCounterpartyCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class SubscriptionUpgradeCounterpartyCrmAction
 * @package App\Domains\Crm\Actions
 */
class SubscriptionUpgradeCounterpartyCrmAction
{
    public function run(BaseCrmRequestDto $dto, string $uuid): ResourceResponseDto
    {
        $subscriptionUpgradeCounterpartyCrmTask = new SubscriptionUpgradeCounterpartyCrmTask($uuid);

        return $subscriptionUpgradeCounterpartyCrmTask->run($dto);
    }
}
