<?php

namespace App\Domains\Takiedela\Dto\Base;

use App\Parents\Dto\Base\DataTransferObject;

class BaseTakiedelaRequestDto extends DataTransferObject
{
    public string $token = '';
    public int|null $fr;
}
