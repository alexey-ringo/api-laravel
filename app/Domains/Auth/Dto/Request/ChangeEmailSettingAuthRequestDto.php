<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class ChangeEmailSettingAuthRequestDto extends BaseAuthRequestDto
{
    public string $access_token;
    public string $email;
}
