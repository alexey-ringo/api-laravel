<?php

namespace App\Domains\Takiedela\Actions;

use App\Domains\Takiedela\Dto\Request\PostsCountByCaseTakiedelaRequestDto;
use App\Domains\Takiedela\Tasks\PostsCountByCaseTakiedelaTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class PostsCountByCaseTakiedelaAction
{
    private PostsCountByCaseTakiedelaTask $postsCountByCaseTakiedelaTask;

    public function __construct(PostsCountByCaseTakiedelaTask $postsCountByCaseTakiedelaTask)
    {
        $this->postsCountByCaseTakiedelaTask = $postsCountByCaseTakiedelaTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(PostsCountByCaseTakiedelaRequestDto $dto): ResourceResponseDto
    {
        return $this->postsCountByCaseTakiedelaTask->run($dto);
    }
}
