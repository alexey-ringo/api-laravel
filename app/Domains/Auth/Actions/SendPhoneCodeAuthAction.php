<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\PhoneAuthRequestDto;
use App\Domains\Auth\Tasks\SendPhoneCodeAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SendPhoneCodeAuthAction
{
    private SendPhoneCodeAuthTask $sendPhoneCodeAuthTask;

    public function __construct(SendPhoneCodeAuthTask $sendPhoneCodeAuthTask)
    {
        $this->sendPhoneCodeAuthTask = $sendPhoneCodeAuthTask;
    }

    public function run(PhoneAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->sendPhoneCodeAuthTask->run($dto);
    }
}
