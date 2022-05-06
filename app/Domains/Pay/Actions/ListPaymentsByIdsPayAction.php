<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\ListPaymentsByIdsPayRequestDto;
use App\Domains\Pay\Tasks\ListPaymentsByIdsPayTask;
use App\Domains\Pay\Tasks\ListSimplePaymentsByIdsPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ListPaymentsByIdsPayAction
{
    private ListPaymentsByIdsPayTask $listPaymentsByIdsPayTask;
    private ListSimplePaymentsByIdsPayTask $listSimplePaymentsByIdsPayTask;

    public function __construct(ListPaymentsByIdsPayTask $listPaymentsByIdsPayTask, ListSimplePaymentsByIdsPayTask $listSimplePaymentsByIdsPayTask)
    {
        $this->listPaymentsByIdsPayTask = $listPaymentsByIdsPayTask;
        $this->listSimplePaymentsByIdsPayTask = $listSimplePaymentsByIdsPayTask;
    }

    public function run(ListPaymentsByIdsPayRequestDto $dto): ResourceResponseDto
    {
        if (isset($dto->simple) && $dto->simple === true) {
            return $this->listSimplePaymentsByIdsPayTask->run($dto);
        } else {
            return $this->listPaymentsByIdsPayTask->run($dto);
        }
    }
}
