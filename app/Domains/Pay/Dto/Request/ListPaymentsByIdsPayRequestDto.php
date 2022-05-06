<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class ListPaymentsByIdsPayRequestDto extends BasePayRequestDto
{
    public array $id;
    public bool|null $simple;
}
