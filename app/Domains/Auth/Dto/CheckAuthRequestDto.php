<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class CheckAuthRequestDto extends BaseAuthRequestDto
{
    public string $email;
    public string $password;
}
