<?php

namespace App\Domains\Comments\Actions;

use App\Domains\Comments\Dto\Request\IndexCommentCommentsRequestDto;
use App\Domains\Comments\Tasks\IndexCommentCommentsTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class IndexCommentCommentsAction
{
    private IndexCommentCommentsTask $indexCommentCommentsTask;

    public function __construct(IndexCommentCommentsTask $indexCommentCommentsTask)
    {
        $this->indexCommentCommentsTask = $indexCommentCommentsTask;
    }

    public function run(IndexCommentCommentsRequestDto $dto): ResourceResponseDto
    {
        return $this->indexCommentCommentsTask->run($dto);
    }
}
