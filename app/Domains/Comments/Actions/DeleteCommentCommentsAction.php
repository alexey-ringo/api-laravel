<?php

namespace App\Domains\Comments\Actions;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;
use App\Domains\Comments\Tasks\DeleteCommentCommentsTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class DeleteCommentCommentsAction
 * @package App\Domains\Comments\Actions
 */
class DeleteCommentCommentsAction
{
    public function run(BaseCommentsRequestDto $dto, int $id): ResourceResponseDto
    {
        $deleteCommentCommentsTask = new DeleteCommentCommentsTask($id);

        return $deleteCommentCommentsTask->run($dto);
    }
}
