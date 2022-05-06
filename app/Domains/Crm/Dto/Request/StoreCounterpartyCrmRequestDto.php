<?php

namespace App\Domains\Crm\Dto\Request;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;

class StoreCounterpartyCrmRequestDto extends BaseCrmRequestDto
{
    public string $model_type;
    public int $model_id;
}
