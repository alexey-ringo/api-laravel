<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class ShowUserAuthRequestDto extends BaseAuthRequestDto
{
    public int|null $id;
    public string|null $email;
}
