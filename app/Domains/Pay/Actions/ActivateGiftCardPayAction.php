<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\ActivateGiftCardPayRequestDto;
use App\Domains\Pay\Tasks\ActivateGiftCardPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ActivateGiftCardPayAction
{
    private ActivateGiftCardPayTask $activateGiftCardPayTask;

    public function __construct(ActivateGiftCardPayTask $activateGiftCardPayTask)
    {
        $this->activateGiftCardPayTask = $activateGiftCardPayTask;
    }

    public function run(ActivateGiftCardPayRequestDto $dto): ResourceResponseDto
    {
        return $this->activateGiftCardPayTask->run($dto);
    }
}
