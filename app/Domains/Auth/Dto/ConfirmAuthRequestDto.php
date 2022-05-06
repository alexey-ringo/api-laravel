<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class ConfirmAuthRequestDto extends BaseAuthRequestDto
{
    public string $email;
}
