<?php

namespace App\Domains\Comments\Tasks;

use App\Domains\Comments\Dto\Response\DataDto\CommentCommentsResponseDataDto;
use App\Domains\Comments\Tasks\Base\AbstractResourceCommentsTask;
use App\Parents\Tasks\AbstractTask;

class CreateCommentCommentsTask extends AbstractResourceCommentsTask
{
    protected string $apiPath = '/comments/create';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = CommentCommentsResponseDataDto::class;
}
