<?php

namespace App\Domains\Takiedela\Actions;

use App\Domains\Takiedela\Dto\Request\TopicsTakiedelaRequestDto;
use App\Domains\Takiedela\Tasks\TopicsTakiedelaTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class TopicsTakiedelaAction
{
    private TopicsTakiedelaTask $topicsTask;

    public function __construct(TopicsTakiedelaTask $topicsTask)
    {
        $this->topicsTask = $topicsTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(TopicsTakiedelaRequestDto $dto): ResourceResponseDto
    {
        return $this->topicsTask->run($dto);
    }
}
