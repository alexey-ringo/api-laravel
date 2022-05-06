<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class PhoneAuthRequestDto extends BaseAuthRequestDto
{
    public string $phone;
}
