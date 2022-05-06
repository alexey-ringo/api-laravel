<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\RestoreCloudPaymentPayRequestDto;
use App\Domains\Pay\Tasks\RestoreCloudPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class RestoreCloudPaymentPayAction
{
    private RestoreCloudPaymentPayTask $restoreCloudPaymentPayTask;

    public function __construct(RestoreCloudPaymentPayTask $restoreCloudPaymentPayTask)
    {
        $this->restoreCloudPaymentPayTask = $restoreCloudPaymentPayTask;
    }

    public function run(RestoreCloudPaymentPayRequestDto $dto): ResourceResponseDto
    {
        return $this->restoreCloudPaymentPayTask->run($dto);
    }
}
