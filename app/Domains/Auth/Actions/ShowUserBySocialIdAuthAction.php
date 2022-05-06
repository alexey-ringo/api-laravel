<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ShowUserBySocialIdAuthRequestDto;
use App\Domains\Auth\Tasks\ShowUserBySocialIdAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ShowUserBySocialIdAuthAction
{
    private ShowUserBySocialIdAuthTask $showUserBySocialIdAuthTask;

    public function __construct(ShowUserBySocialIdAuthTask $showUserBySocialIdAuthTask)
    {
        $this->showUserBySocialIdAuthTask = $showUserBySocialIdAuthTask;
    }

    public function run(ShowUserBySocialIdAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->showUserBySocialIdAuthTask->run($dto);
    }
}
