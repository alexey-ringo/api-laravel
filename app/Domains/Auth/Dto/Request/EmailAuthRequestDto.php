<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class EmailAuthRequestDto extends BaseAuthRequestDto
{
    public string $email;
}
