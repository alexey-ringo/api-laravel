<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\UpdateCommissionCloudPaymentPayRequestDto;
use App\Domains\Pay\Tasks\UpdateCommissionCloudPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class UpdateCommissionCloudPaymentPayAction
{
    private UpdateCommissionCloudPaymentPayTask $updateCommissionCloudPaymentPayTask;

    public function __construct(UpdateCommissionCloudPaymentPayTask $updateCommissionCloudPaymentPayTask)
    {
        $this->updateCommissionCloudPaymentPayTask = $updateCommissionCloudPaymentPayTask;
    }

    public function run(UpdateCommissionCloudPaymentPayRequestDto $dto): ResourceResponseDto
    {
        return $this->updateCommissionCloudPaymentPayTask->run($dto);
    }
}
