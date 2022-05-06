<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\AuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractWithoutDataAuthTask;

class ChangePasswordSettingAuthTask extends AbstractWithoutDataAuthTask
{
    protected string $apiPath = '/rest/v1/setting/change/password';
    protected string $responseDtoClassName = AuthResponseDto::class;
}
