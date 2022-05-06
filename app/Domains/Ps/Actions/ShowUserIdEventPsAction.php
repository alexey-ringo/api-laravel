<?php

namespace App\Domains\Ps\Actions;

use App\Domains\Ps\Dto\Request\ShowUserIdEventPsRequestDto;
use App\Domains\Ps\Tasks\ShowUserIdEventPsTask;
use App\Parents\Dto\Response\ResourceCollectionDto;

/**
 * Class ShowUserIdEventPsAction
 * @package App\Domains\Ps\Actions
 */
class ShowUserIdEventPsAction
{
    public function run(ShowUserIdEventPsRequestDto $dto, int $id): ResourceCollectionDto
    {
        $showCounterpartyCrmTask = new ShowUserIdEventPsTask($id);

        return $showCounterpartyCrmTask->run($dto);
    }
}
