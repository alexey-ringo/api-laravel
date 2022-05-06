<?php

namespace App\Domains\Tochnost\Dto\Base;

use App\Parents\Dto\Base\DataTransferObject;

class BaseTochnostRequestDto extends DataTransferObject
{
    public string $token = '';
}
