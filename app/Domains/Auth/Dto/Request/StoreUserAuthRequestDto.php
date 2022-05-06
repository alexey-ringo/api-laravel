<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class StoreUserAuthRequestDto extends BaseAuthRequestDto
{
    public string $email;
    public string|null $firstname;
    public string|null $provider;
    public string|null $social_id;
}
