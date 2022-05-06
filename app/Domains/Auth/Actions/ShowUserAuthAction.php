<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ShowUserAuthRequestDto;
use App\Domains\Auth\Tasks\ShowUserAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ShowUserAuthAction
{
    private ShowUserAuthTask $showUserAuthTask;

    public function __construct(ShowUserAuthTask $showUserAuthTask)
    {
        $this->showUserAuthTask = $showUserAuthTask;
    }

    public function run(ShowUserAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->showUserAuthTask->run($dto);
    }
}
