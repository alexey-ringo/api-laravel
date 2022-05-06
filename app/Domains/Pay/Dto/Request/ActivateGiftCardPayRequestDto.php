<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class ActivateGiftCardPayRequestDto extends BasePayRequestDto
{
    public int $user_id;
    public string $code;
}
