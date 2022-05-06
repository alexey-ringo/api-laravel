<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\IndexPaymentPayRequestDto;
use App\Domains\Pay\Tasks\IndexPaymentPayTask;
use App\Parents\Dto\Response\ResourceCollectionDto;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class IndexPaymentPayAction
{
    /**
     * @var IndexPaymentPayTask
     */
    private IndexPaymentPayTask $indexPaymentPayTask;

    /**
     * IndexPaymentPayAction constructor.
     * @param IndexPaymentPayTask $indexPaymentPayTask
     */
    public function __construct(IndexPaymentPayTask $indexPaymentPayTask)
    {
        $this->indexPaymentPayTask = $indexPaymentPayTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(IndexPaymentPayRequestDto $dto): ResourceResponseDto
    {
        return $this->indexPaymentPayTask->run($dto);
    }
}
