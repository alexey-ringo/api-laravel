<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Tasks\UpdateSubscriptionUpgradeCounterpartyCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class UpdateSubscriptionUpgradeCounterpartyCrmAction
 * @package App\Domains\Crm\Actions
 */
class UpdateSubscriptionUpgradeCounterpartyCrmAction
{
    public function run(BaseCrmRequestDto $dto, string $uuid): ResourceResponseDto
    {
        $subscriptionUpgradeCounterpartyCrmTask = new UpdateSubscriptionUpgradeCounterpartyCrmTask($uuid);

        return $subscriptionUpgradeCounterpartyCrmTask->run($dto);
    }
}
