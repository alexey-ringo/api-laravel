<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\DeactivateCloudPaymentPayRequestDto;
use App\Domains\Pay\Tasks\DeactivateCloudPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class DeactivateCloudPaymentPayAction
{
    private DeactivateCloudPaymentPayTask $deactivateCloudPaymentPayTask;

    public function __construct(DeactivateCloudPaymentPayTask $deactivateCloudPaymentPayTask)
    {
        $this->deactivateCloudPaymentPayTask = $deactivateCloudPaymentPayTask;
    }

    public function run(DeactivateCloudPaymentPayRequestDto $dto): ResourceResponseDto
    {
        return $this->deactivateCloudPaymentPayTask->run($dto);
    }
}
