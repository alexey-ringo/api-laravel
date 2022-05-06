<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\UserAuthResponseDataDto;
use App\Domains\Auth\Dto\Response\UserAuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractDataAuthTask;

class FetchOrRegAuthTask extends AbstractDataAuthTask
{
    protected string $apiPath = '/rest/v1/fetch-reg';
    protected string $responseDtoClassName = UserAuthResponseDto::class;
    protected string $responseDataDtoClassName = UserAuthResponseDataDto::class;
}
