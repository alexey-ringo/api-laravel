<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;
use App\Domains\Pay\Tasks\LinkedCardPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class LinkedCardsByIdPayAction
{
    /**
     * @var LinkedCardPaymentPayTask
     */
    private LinkedCardPaymentPayTask $linkedCardPayTask;

    /**
     * LinkedCardsByIdPayAction constructor.
     * @param LinkedCardPaymentPayTask $linkedCardPayTask
     */
    public function __construct(LinkedCardPaymentPayTask $linkedCardPayTask)
    {
        $this->linkedCardPayTask = $linkedCardPayTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(BasePayRequestDto $dto): ResourceResponseDto
    {
        return $this->linkedCardPayTask->run($dto);
    }
}
