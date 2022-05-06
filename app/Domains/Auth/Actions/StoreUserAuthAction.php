<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\StoreUserAuthRequestDto;
use App\Domains\Auth\Tasks\StoreUserAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class StoreUserAuthAction
{
    private StoreUserAuthTask $storeUserAuthTask;

    public function __construct(StoreUserAuthTask $storeUserAuthTask)
    {
        $this->storeUserAuthTask = $storeUserAuthTask;
    }

    public function run(StoreUserAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->storeUserAuthTask->run($dto);
    }
}
