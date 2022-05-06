<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\CreateCardPayRequestDto;
use App\Domains\Pay\Tasks\CreateCardPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class CreateCardPayAction
{
    private CreateCardPayTask $createCardPayTask;

    public function __construct(CreateCardPayTask $createCardPayTask)
    {
        $this->createCardPayTask = $createCardPayTask;
    }

    public function run(CreateCardPayRequestDto $dto): ResourceResponseDto
    {
        return $this->createCardPayTask->run($dto);
    }
}
