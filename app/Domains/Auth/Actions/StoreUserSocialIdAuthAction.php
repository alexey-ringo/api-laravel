<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\StoreUserSocialIdAuthRequestDto;
use App\Domains\Auth\Tasks\StoreUserSocialIdAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class StoreUserSocialIdAuthAction
{
    public function run(StoreUserSocialIdAuthRequestDto $dto, int $id): ResourceResponseDto
    {
        $storeUserSocialIdAuthTask = new StoreUserSocialIdAuthTask($id);

        return $storeUserSocialIdAuthTask->run($dto);
    }
}
