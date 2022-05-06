<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class RecoveryAuthRequestDto extends BaseAuthRequestDto
{
    public string $email;
}
