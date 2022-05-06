<?php

namespace App\Domains\Ps\Dto\Request;

use App\Domains\Ps\Dto\Base\BasePsRequestDto;

class IndexEventPsRequestDto extends BasePsRequestDto
{
    public int|null $limit;
    public int|null $offset;
}
