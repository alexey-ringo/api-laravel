<?php

namespace App\Domains\Core\Actions;

use App\Domains\Core\Dto\Request\IndexCaseCoreRequestDto;
use App\Domains\Core\Tasks\IndexCaseCoreTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class IndexCaseCoreAction
{
    private IndexCaseCoreTask $indexCaseCoreTask;

    public function __construct(IndexCaseCoreTask $indexCaseCoreTask)
    {
        $this->indexCaseCoreTask = $indexCaseCoreTask;
    }

    public function run(IndexCaseCoreRequestDto $dto): ResourceResponseDto
    {
        return $this->indexCaseCoreTask->run($dto);
    }
}
