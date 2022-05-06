<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class LogoutAuthRequestDto extends BaseAuthRequestDto
{
    public int $user_id;
}
