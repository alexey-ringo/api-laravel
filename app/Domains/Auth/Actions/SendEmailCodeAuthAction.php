<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\EmailAuthRequestDto;
use App\Domains\Auth\Tasks\SendEmailCodeAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SendEmailCodeAuthAction
{
    private SendEmailCodeAuthTask $sendEmailCodeAuthTask;

    public function __construct(SendEmailCodeAuthTask $sendEmailCodeAuthTask)
    {
        $this->sendEmailCodeAuthTask = $sendEmailCodeAuthTask;
    }

    public function run(EmailAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->sendEmailCodeAuthTask->run($dto);
    }
}
