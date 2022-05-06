<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Tasks\SyncCounterpartyCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class SyncCounterpartyCrmAction
 * @package App\Domains\Crm\Actions
 */
class SyncCounterpartyCrmAction
{
    public function run(BaseCrmRequestDto $dto, string $provider): ResourceResponseDto
    {
        $syncCounterpartyCrmTask = new SyncCounterpartyCrmTask($provider);

        return $syncCounterpartyCrmTask->run($dto);
    }
}
