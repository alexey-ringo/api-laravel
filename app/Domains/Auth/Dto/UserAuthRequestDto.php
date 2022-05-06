<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class UserAuthRequestDto extends BaseAuthRequestDto
{
    public int|null $id;
    public string|null $email;
}
