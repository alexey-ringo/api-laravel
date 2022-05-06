<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\ManageCardPayRequestDto;
use App\Domains\Pay\Tasks\SetMainCardPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SetMainCardPayAction
{
    private SetMainCardPayTask $setMainCardPayTask;

    public function __construct(SetMainCardPayTask $setMainCardPayTask)
    {
        $this->setMainCardPayTask = $setMainCardPayTask;
    }

    public function run(ManageCardPayRequestDto $dto): ResourceResponseDto
    {
        return $this->setMainCardPayTask->run($dto);
    }
}
