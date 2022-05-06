<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\Response\AuthResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractWithoutDataAuthTask;

class DeleteUserSocialIdAuthTask extends AbstractWithoutDataAuthTask
{
    protected string $responseDtoClassName = AuthResponseDto::class;

    public function __construct(int $id)
    {
        $this->apiPath = '/rest/v1/user/update/' . $id . '/delete/social';
    }
}
