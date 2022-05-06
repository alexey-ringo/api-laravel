<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class StoreUserSocialIdAuthRequestDto extends BaseAuthRequestDto
{
    public string $provider;
    public string $social_id;
}
