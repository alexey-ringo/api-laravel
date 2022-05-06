<?php

namespace App\Domains\Takiedela\Tasks;

use App\Domains\Takiedela\Dto\Response\ResponseDto\PostsCountByCaseTakiedelaResponseDto;
use App\Domains\Takiedela\Tasks\Base\AbstractResourseTakiedelaTask;
use App\Parents\Tasks\AbstractTask;

class PostsCountByCaseTakiedelaTask extends AbstractResourseTakiedelaTask
{
    protected bool $isOriginalContentWrapped = false;
    protected string $apiPath = '/posts-count';
    protected string $responseDtoClassName = PostsCountByCaseTakiedelaResponseDto::class;
    protected string $httpType = AbstractTask::GET_TYPE;
}
