<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\UpdateCloudPaymentPayRequestDto;
use App\Domains\Pay\Tasks\UpdateCloudPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class UpdateCloudPaymentPayAction
{
    private UpdateCloudPaymentPayTask $updateCloudPaymentPayTask;

    public function __construct(UpdateCloudPaymentPayTask $updateCloudPaymentPayTask)
    {
        $this->updateCloudPaymentPayTask = $updateCloudPaymentPayTask;
    }

    public function run(UpdateCloudPaymentPayRequestDto $dto): ResourceResponseDto
    {
        return $this->updateCloudPaymentPayTask->run($dto);
    }
}
