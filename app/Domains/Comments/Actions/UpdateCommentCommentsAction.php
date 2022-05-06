<?php

namespace App\Domains\Comments\Actions;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;
use App\Domains\Comments\Tasks\UpdateCommentCommentsTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class UpdateCommentCommentsAction
 * @package App\Domains\Comments\Actions
 */
class UpdateCommentCommentsAction
{
    public function run(BaseCommentsRequestDto $dto, int $id): ResourceResponseDto
    {
        $updateCommentCommentsTask = new UpdateCommentCommentsTask($id);

        return $updateCommentCommentsTask->run($dto);
    }
}
