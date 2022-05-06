<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class DeleteUserSocialIdAuthRequestDto extends BaseAuthRequestDto
{
    public string $provider;
}
