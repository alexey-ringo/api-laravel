<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ChangePhoneSettingAuthRequestDto;
use App\Domains\Auth\Tasks\ChangePhoneSettingAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ChangePhoneSettingAuthAction
{
    private ChangePhoneSettingAuthTask $changePhoneSettingAuthTask;

    public function __construct(ChangePhoneSettingAuthTask $changePhoneSettingAuthTask)
    {
        $this->changePhoneSettingAuthTask = $changePhoneSettingAuthTask;
    }

    public function run(ChangePhoneSettingAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->changePhoneSettingAuthTask->run($dto);
    }
}
