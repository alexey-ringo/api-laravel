<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\CodePhoneAuthRequestDto;
use App\Domains\Auth\Tasks\LoginPhoneCodeAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class LoginPhoneCodeAuthAction
{
    private LoginPhoneCodeAuthTask $loginPhoneCodeAuthTask;

    public function __construct(LoginPhoneCodeAuthTask $loginPhoneCodeAuthTask)
    {
        $this->loginPhoneCodeAuthTask = $loginPhoneCodeAuthTask;
    }

    public function run(CodePhoneAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->loginPhoneCodeAuthTask->run($dto);
    }
}
