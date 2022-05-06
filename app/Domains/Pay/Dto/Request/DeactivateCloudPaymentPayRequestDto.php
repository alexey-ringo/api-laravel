<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class DeactivateCloudPaymentPayRequestDto extends BasePayRequestDto
{
    public int $signup_id;
    public int $user_id;
}
