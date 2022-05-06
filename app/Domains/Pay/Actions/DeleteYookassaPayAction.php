<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\DeleteYookassaPayRequestDto;
use App\Domains\Pay\Tasks\DeleteYookassaPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class DeleteYookassaPayAction
{
    private DeleteYookassaPayTask $deleteYookassaPayTask;

    public function __construct(DeleteYookassaPayTask $deleteYookassaPayTask)
    {
        $this->deleteYookassaPayTask = $deleteYookassaPayTask;
    }

    public function run(DeleteYookassaPayRequestDto $dto): ResourceResponseDto
    {
        return $this->deleteYookassaPayTask->run($dto);
    }
}
