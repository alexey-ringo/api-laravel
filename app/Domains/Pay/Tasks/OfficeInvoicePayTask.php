<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\InvoicePayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class OfficeInvoicePayTask extends AbstractResourcePayTask
{
//    Not wrap in data - $contentArrayName = null;
    protected array $addParams = [
        'status' => 'status',
    ];
    protected string $apiPath = '/payments/invoice';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = InvoicePayResponseDto::class;
}
