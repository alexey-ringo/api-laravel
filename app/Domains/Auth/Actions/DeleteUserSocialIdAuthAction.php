<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\DeleteUserSocialIdAuthRequestDto;
use App\Domains\Auth\Tasks\DeleteUserSocialIdAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class DeleteUserSocialIdAuthAction
{
    public function run(DeleteUserSocialIdAuthRequestDto $dto, int $id): ResourceResponseDto
    {
        $deleteUserSocialIdAuthTask = new DeleteUserSocialIdAuthTask($id);

        return $deleteUserSocialIdAuthTask->run($dto);
    }
}
