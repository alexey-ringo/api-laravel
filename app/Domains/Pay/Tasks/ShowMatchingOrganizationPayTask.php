<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\ResponseDto\MatchingOrganizationPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class ShowMatchingOrganizationPayTask extends AbstractResourcePayTask
{
    protected array $addParams = [
        'status' => 'status'
    ];
    protected string $apiPath = '/matching/getorg';
    protected string $httpType = AbstractTask::GET_TYPE;

    protected string $responseDtoClassName = MatchingOrganizationPayResponseDto::class;
}
