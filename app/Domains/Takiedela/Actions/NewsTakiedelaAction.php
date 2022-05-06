<?php

namespace App\Domains\Takiedela\Actions;

use App\Domains\Takiedela\Tasks\NewsTakiedelaTask;
use App\Domains\Takiedela\Dto\Request\PostsTakiedelaRequestDto;
use App\Parents\Dto\Response\ResourceResponseDto;

class NewsTakiedelaAction
{
    private NewsTakiedelaTask $newsTask;

    public function __construct(NewsTakiedelaTask $newsTask)
    {
        $this->newsTask = $newsTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(PostsTakiedelaRequestDto $dto): ResourceResponseDto
    {
        return $this->newsTask->run($dto);
    }
}
