<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\SendCodeAuthRequestDto;
use App\Domains\Auth\Tasks\SendCodeNoDelayAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SendCodeNoDelayAuthAction
{
    private SendCodeNoDelayAuthTask $sendCodeDataAuthTask;

    public function __construct(SendCodeNoDelayAuthTask $sendCodeDataAuthTask)
    {
        $this->sendCodeDataAuthTask = $sendCodeDataAuthTask;
    }

    public function run(SendCodeAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->sendCodeDataAuthTask->run($dto);
    }
}
