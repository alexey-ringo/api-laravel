<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\CreateCloudPaymentPayRequestDto;
use App\Domains\Pay\Tasks\CreateCloudPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class CreateCloudPaymentPayAction
{
    private CreateCloudPaymentPayTask $createCloudPaymentPayTask;

    public function __construct(CreateCloudPaymentPayTask $createCloudPaymentPayTask)
    {
        $this->createCloudPaymentPayTask = $createCloudPaymentPayTask;
    }

    public function run(CreateCloudPaymentPayRequestDto $dto): ResourceResponseDto
    {
        return $this->createCloudPaymentPayTask->run($dto);
    }
}
