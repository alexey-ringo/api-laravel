<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Tasks\AttachCounterpartyCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class AttachCounterpartyCrmAction
 * @package App\Domains\Crm\Actions
 */
class AttachCounterpartyCrmAction
{
    public function run(BaseCrmRequestDto $dto, string $provider): ResourceResponseDto
    {
        $attachCounterpartyCrmTask = new AttachCounterpartyCrmTask($provider);

        return $attachCounterpartyCrmTask->run($dto);
    }
}
