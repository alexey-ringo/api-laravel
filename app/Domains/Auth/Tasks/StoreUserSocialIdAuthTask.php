<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\AuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractWithoutDataAuthTask;

class StoreUserSocialIdAuthTask extends AbstractWithoutDataAuthTask
{
    protected string $responseDtoClassName = AuthResponseDto::class;

    public function __construct(int $id)
    {
        $this->apiPath = '/rest/v1/user/update/' . $id . '/store/social';
    }
}
