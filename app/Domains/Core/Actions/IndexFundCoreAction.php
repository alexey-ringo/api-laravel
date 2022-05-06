<?php

namespace App\Domains\Core\Actions;

use App\Domains\Core\Dto\Request\IndexFundCoreRequestDto;
use App\Domains\Core\Tasks\IndexFundCoreTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class IndexFundCoreAction
{
    private IndexFundCoreTask $indexFundCoreTask;

    public function __construct(IndexFundCoreTask $indexFundCoreTask)
    {
        $this->indexFundCoreTask = $indexFundCoreTask;
    }

    public function run(IndexFundCoreRequestDto $dto): ResourceResponseDto
    {
        return $this->indexFundCoreTask->run($dto);
    }
}
