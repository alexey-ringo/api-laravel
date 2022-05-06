<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\UpdateUserAuthAuthRequestDto;
use App\Domains\Auth\Tasks\UpdateUserAuthAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class UpdateUserAuthAuthAction
{
    public function run(UpdateUserAuthAuthRequestDto $dto, int $id): ResourceResponseDto
    {
        $updateUserAuthAuthTask = new UpdateUserAuthAuthTask($id);

        return $updateUserAuthAuthTask->run($dto);
    }
}
