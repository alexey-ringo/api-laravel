<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\ListSimplePaymentsInfoPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class ListSimplePaymentsByIdsPayTask extends AbstractResourcePayTask
{
    protected string $contentArrayName = 'result';
    protected array $addParams = [
        'status' => 'status'
    ];
    protected string $apiPath = '/payments/getById';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDtoClassName = ListSimplePaymentsInfoPayResponseDto::class;
}
