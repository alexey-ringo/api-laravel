<?php

namespace App\Domains\Comments\Actions;

use App\Domains\Comments\Dto\Request\CreateCommentCommentsRequestDto;
use App\Domains\Comments\Tasks\CreateCommentCommentsTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class CreateCommentCommentsAction
{
    private CreateCommentCommentsTask $createCommentCommentsTask;

    public function __construct(CreateCommentCommentsTask $createCommentCommentsTask)
    {
        $this->createCommentCommentsTask = $createCommentCommentsTask;
    }

    public function run(CreateCommentCommentsRequestDto $dto): ResourceResponseDto
    {
        return $this->createCommentCommentsTask->run($dto);
    }
}
