<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\CodeEmailAuthRequestDto;
use App\Domains\Auth\Tasks\LoginEmailCodeAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class LoginEmailCodeAuthAction
{
    private LoginEmailCodeAuthTask $loginEmailCodeAuthTask;

    public function __construct(LoginEmailCodeAuthTask $loginEmailCodeAuthTask)
    {
        $this->loginEmailCodeAuthTask = $loginEmailCodeAuthTask;
    }

    public function run(CodeEmailAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->loginEmailCodeAuthTask->run($dto);
    }
}
