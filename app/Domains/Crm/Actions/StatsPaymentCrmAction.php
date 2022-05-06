<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Request\StatsPaymentCrmRequestDto;
use App\Domains\Crm\Tasks\StatsPaymentCrmTask;
use App\Parents\Dto\Response\ResourceAdditionalCollectionDto;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class StoreVirtualAccountCrmAction
 * @package App\Domains\Crm\Actions
 */
class StatsPaymentCrmAction
{
    private StatsPaymentCrmTask $statsPaymentCrmTask;

    public function __construct(StatsPaymentCrmTask $statsPaymentCrmTask)
    {
        $this->statsPaymentCrmTask = $statsPaymentCrmTask;
    }

    public function run(StatsPaymentCrmRequestDto $dto): ResourceResponseDto/*ResourceAdditionalCollectionDto*/
    {
        //@phpstan-ignore-next-line
        return $this->statsPaymentCrmTask->run($dto);
    }
}
