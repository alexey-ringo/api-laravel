<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class CodeEmailAuthRequestDto extends BaseAuthRequestDto
{
    public string $code;
    public string $email;
}
