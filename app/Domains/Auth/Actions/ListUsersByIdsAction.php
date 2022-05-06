<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ListUsersByIdsRequestDto;
use App\Domains\Auth\Tasks\ListUsersByIdsAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ListUsersByIdsAction
{
    private ListUsersByIdsAuthTask $listUsersByIdAuthTask;

    public function __construct(ListUsersByIdsAuthTask $listUsersByIdAuthTask)
    {
        $this->listUsersByIdAuthTask = $listUsersByIdAuthTask;
    }

    public function run(ListUsersByIdsRequestDto $requestDto): ResourceResponseDto
    {
        return $this->listUsersByIdAuthTask->run($requestDto);
    }
}
