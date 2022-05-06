<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class ConfirmPhoneSettingAuthRequestDto extends BaseAuthRequestDto
{
    public string $access_token;
    public int $code;
    public string $phone;
}
