<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Tasks\ShowCounterpartyCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class ShowCounterpartyCrmAction
 * @package App\Domains\Crm\Actions
 */
class ShowCounterpartyCrmAction
{
    public function run(BaseCrmRequestDto $dto, string $uuid): ResourceResponseDto
    {
        $showCounterpartyCrmTask = new ShowCounterpartyCrmTask($uuid);

        return $showCounterpartyCrmTask->run($dto);
    }
}
