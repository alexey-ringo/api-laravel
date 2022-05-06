<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\SendCodeAuthRequestDto;
use App\Domains\Auth\Tasks\SendCodeAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SendCodeAuthAction
{
    private SendCodeAuthTask $sendCodeDataAuthTask;

    public function __construct(SendCodeAuthTask $sendCodeDataAuthTask)
    {
        $this->sendCodeDataAuthTask = $sendCodeDataAuthTask;
    }

    public function run(SendCodeAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->sendCodeDataAuthTask->run($dto);
    }
}
