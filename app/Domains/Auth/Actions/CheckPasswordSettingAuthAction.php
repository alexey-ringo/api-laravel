<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\CheckPasswordSettingAuthRequestDto;
use App\Domains\Auth\Tasks\CheckPasswordSettingAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class CheckPasswordSettingAuthAction
{
    private CheckPasswordSettingAuthTask $checkPasswordSettingAuthTask;

    public function __construct(CheckPasswordSettingAuthTask $checkPasswordSettingAuthTask)
    {
        $this->checkPasswordSettingAuthTask = $checkPasswordSettingAuthTask;
    }

    public function run(CheckPasswordSettingAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->checkPasswordSettingAuthTask->run($dto);
    }
}
