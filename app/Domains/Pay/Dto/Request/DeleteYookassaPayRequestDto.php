<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class DeleteYookassaPayRequestDto extends BasePayRequestDto
{
    public int $id;
}
