<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\UpdateUserMetaAuthRequestDto;
use App\Domains\Auth\Tasks\UpdateUserMetaAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class UpdateUserMetaAuthAction
{
    public function run(UpdateUserMetaAuthRequestDto $dto, int $id): ResourceResponseDto
    {
        $updateUserMetaAuthTask = new UpdateUserMetaAuthTask($id);

        return $updateUserMetaAuthTask->run($dto);
    }
}
