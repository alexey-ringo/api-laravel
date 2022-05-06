<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class SendCodeAuthRequestDto extends BaseAuthRequestDto
{
    public string|null $email;
    public string|null $phone;
    public string $channel;
}
