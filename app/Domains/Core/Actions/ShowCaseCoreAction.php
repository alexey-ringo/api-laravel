<?php

namespace App\Domains\Core\Actions;

use App\Domains\Core\Dto\Request\ShowCaseCoreRequestDto;
use App\Domains\Core\Tasks\ShowCaseCoreTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class ShowCaseCoreAction
 * @package App\Domains\Core\Actions
 */
class ShowCaseCoreAction
{
    public function run(ShowCaseCoreRequestDto $dto, string $uuid): ResourceResponseDto
    {
        $showCaseCoreTask = new ShowCaseCoreTask($uuid);

        return $showCaseCoreTask->run($dto);
    }
}
