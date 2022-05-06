<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ConfirmPhoneSettingAuthRequestDto;
use App\Domains\Auth\Tasks\ConfirmPhoneSettingAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ConfirmPhoneSettingAuthAction
{
    private ConfirmPhoneSettingAuthTask $verificationPhoneSettingAuthTask;

    public function __construct(ConfirmPhoneSettingAuthTask $verificationPhoneSettingAuthTask)
    {
        $this->verificationPhoneSettingAuthTask = $verificationPhoneSettingAuthTask;
    }

    public function run(ConfirmPhoneSettingAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->verificationPhoneSettingAuthTask->run($dto);
    }
}
