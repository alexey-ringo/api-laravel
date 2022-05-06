<?php

namespace App\Domains\Comments\Tasks;

use App\Domains\Comments\Dto\Response\CollectionDto\CommentCollectionCommentsResponseDto;
use App\Domains\Comments\Tasks\Base\AbstractResourceCommentsTask;
use App\Parents\Tasks\AbstractTask;

class IndexCommentCommentsTask extends AbstractResourceCommentsTask
{
    protected string $apiPath = '/comments';
    protected string $httpType = AbstractTask::GET_TYPE;
    protected bool $isOriginalContentWrapped = false;

    protected string $responseDtoClassName = CommentCollectionCommentsResponseDto::class;
}
