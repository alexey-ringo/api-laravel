<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class LinkedCardByIdPayRequestDto extends BasePayRequestDto
{
    public int $user_id = 0;
}
