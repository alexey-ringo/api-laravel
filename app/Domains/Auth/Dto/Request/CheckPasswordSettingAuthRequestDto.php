<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class CheckPasswordSettingAuthRequestDto extends BaseAuthRequestDto
{
    public string $access_token;
    public string $current_password;
    public string|null $password;
}
