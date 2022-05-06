<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\UpdateYookassaPayRequestDto;
use App\Domains\Pay\Tasks\UpdateYookassaPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class UpdateYookassaPayAction
{
    private UpdateYookassaPayTask $updateYookassaPayTask;

    public function __construct(UpdateYookassaPayTask $updateYookassaPayTask)
    {
        $this->updateYookassaPayTask = $updateYookassaPayTask;
    }

    public function run(UpdateYookassaPayRequestDto $dto): ResourceResponseDto
    {
        return $this->updateYookassaPayTask->run($dto);
    }
}
