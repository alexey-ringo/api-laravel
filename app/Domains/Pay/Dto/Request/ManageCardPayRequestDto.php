<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class ManageCardPayRequestDto extends BasePayRequestDto
{
    public int $user_id;
    public int $card_id;
}
