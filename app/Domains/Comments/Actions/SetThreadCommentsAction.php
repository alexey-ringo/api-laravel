<?php

namespace App\Domains\Comments\Actions;

use App\Domains\Comments\Dto\Request\SetThreadCommentsRequestDto;
use App\Domains\Comments\Tasks\SetThreadCommentsTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SetThreadCommentsAction
{
    private SetThreadCommentsTask $setThreadCommentsTask;

    public function __construct(SetThreadCommentsTask $setThreadCommentsTask)
    {
        $this->setThreadCommentsTask = $setThreadCommentsTask;
    }

    public function run(SetThreadCommentsRequestDto $dto): ResourceResponseDto
    {
        return $this->setThreadCommentsTask->run($dto);
    }
}
