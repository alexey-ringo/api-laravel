<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class FetchUserAuthRequestDto extends BaseAuthRequestDto
{
    public string $token;
}
