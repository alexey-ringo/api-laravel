<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\ManageCardPayRequestDto;
use App\Domains\Pay\Tasks\DeleteCardPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class DeleteCardPayAction
{
    private DeleteCardPayTask $deleteCardPayTask;

    public function __construct(DeleteCardPayTask $deleteCardPayTask)
    {
        $this->deleteCardPayTask = $deleteCardPayTask;
    }

    public function run(ManageCardPayRequestDto $dto): ResourceResponseDto
    {
        return $this->deleteCardPayTask->run($dto);
    }
}
