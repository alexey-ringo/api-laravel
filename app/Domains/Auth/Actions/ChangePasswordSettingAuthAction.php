<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ChangePasswordSettingAuthRequestDto;
use App\Domains\Auth\Tasks\ChangePasswordSettingAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ChangePasswordSettingAuthAction
{
    private ChangePasswordSettingAuthTask $changePasswordSettingAuthTask;

    public function __construct(ChangePasswordSettingAuthTask $changePasswordSettingAuthTask)
    {
        $this->changePasswordSettingAuthTask = $changePasswordSettingAuthTask;
    }

    public function run(ChangePasswordSettingAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->changePasswordSettingAuthTask->run($dto);
    }
}
