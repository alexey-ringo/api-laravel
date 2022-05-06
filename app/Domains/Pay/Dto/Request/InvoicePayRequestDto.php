<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class InvoicePayRequestDto extends BasePayRequestDto
{
    public string $id;
}
