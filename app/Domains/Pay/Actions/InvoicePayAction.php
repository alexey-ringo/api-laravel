<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\InvoicePayRequestDto;
use App\Domains\Pay\Tasks\OfficeInvoicePayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class InvoicePayAction
{
    private OfficeInvoicePayTask $officeInvoicePayTask;

    public function __construct(OfficeInvoicePayTask $officeInvoicePayTask)
    {
        $this->officeInvoicePayTask = $officeInvoicePayTask;
    }

    public function run(InvoicePayRequestDto $dto): ResourceResponseDto
    {
        return $this->officeInvoicePayTask->run($dto);
    }
}
