<?php

namespace App\Domains\Core\Actions;

use App\Domains\Core\Dto\Request\ShowFundCoreRequestDto;
use App\Domains\Core\Tasks\ShowFundCoreTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class ShowFundCoreAction
 * @package App\Domains\Core\Actions
 */
class ShowFundCoreAction
{
    public function run(ShowFundCoreRequestDto $dto, string $uuid): ResourceResponseDto
    {
        $showFundCoreTask = new ShowFundCoreTask($uuid);

        return $showFundCoreTask->run($dto);
    }
}
