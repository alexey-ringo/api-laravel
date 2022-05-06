<?php

namespace App\Domains\Comments\Tasks;

use App\Domains\Comments\Dto\Response\DataDto\ThreadCommentsResponseDataDto;
use App\Domains\Comments\Tasks\Base\AbstractResourceCommentsTask;
use App\Parents\Tasks\AbstractTask;

class SetThreadCommentsTask extends AbstractResourceCommentsTask
{
    protected string $apiPath = '/thread';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = ThreadCommentsResponseDataDto::class;
}
