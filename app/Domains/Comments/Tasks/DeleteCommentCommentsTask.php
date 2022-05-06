<?php

namespace App\Domains\Comments\Tasks;

use App\Domains\Comments\Tasks\Base\AbstractResourceCommentsTask;
use App\Parents\Dto\Response\MessageStringResponseDto;
use App\Parents\Tasks\AbstractTask;

class DeleteCommentCommentsTask extends AbstractResourceCommentsTask
{
    protected string $httpType = AbstractTask::DELETE_TYPE;

    protected string $responseDtoClassName = MessageStringResponseDto::class;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->apiPath = '/comments/delete/' . $id;
    }
}
