<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\UpdateYookassaPayRequestDto;
use App\Domains\Pay\Tasks\RestoreYookassaPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class RestoreYookassaPayAction
{
    private RestoreYookassaPayTask $restoreYookassaPayTask;

    public function __construct(RestoreYookassaPayTask $restoreYookassaPayTask)
    {
        $this->restoreYookassaPayTask = $restoreYookassaPayTask;
    }

    public function run(UpdateYookassaPayRequestDto $dto): ResourceResponseDto
    {
        return $this->restoreYookassaPayTask->run($dto);
    }
}
