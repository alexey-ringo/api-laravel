<?php

namespace App\Domains\Comments\Tasks;

use App\Domains\Comments\Dto\Response\DataDto\CommentCommentsResponseDataDto;
use App\Domains\Comments\Tasks\Base\AbstractResourceCommentsTask;
use App\Parents\Tasks\AbstractTask;

class UpdateCommentCommentsTask extends AbstractResourceCommentsTask
{
    protected string $httpType = AbstractTask::PUT_TYPE;

    protected string $responseDtoClassName = CommentCommentsResponseDataDto::class;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->apiPath = '/comments/update/' . $id;
    }
}
