<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\CloudPaymentPayRequestDto;
use App\Domains\Pay\Tasks\CloudPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class CloudPaymentPayAction
{
    /**
     * @var CloudPaymentPayTask
     */
    private CloudPaymentPayTask $cloudPaymentPayTask;

    /**
     * CloudPaymentPayAction constructor.
     * @param CloudPaymentPayTask $cloudPaymentPayTask
     */
    public function __construct(CloudPaymentPayTask $cloudPaymentPayTask)
    {
        $this->cloudPaymentPayTask = $cloudPaymentPayTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(CloudPaymentPayRequestDto $dto): ResourceResponseDto
    {
        return $this->cloudPaymentPayTask->run($dto);
    }
}
