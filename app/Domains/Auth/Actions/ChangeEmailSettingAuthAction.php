<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ChangeEmailSettingAuthRequestDto;
use App\Domains\Auth\Tasks\ChangeEmailSettingAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ChangeEmailSettingAuthAction
{
    private ChangeEmailSettingAuthTask $changeEmailSettingAuthTask;

    public function __construct(ChangeEmailSettingAuthTask $changeEmailSettingAuthTask)
    {
        $this->changeEmailSettingAuthTask = $changeEmailSettingAuthTask;
    }

    public function run(ChangeEmailSettingAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->changeEmailSettingAuthTask->run($dto);
    }
}
