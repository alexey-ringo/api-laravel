<?php

namespace App\Domains\Ps\Dto\Request;

use App\Domains\Ps\Dto\Base\BasePsRequestDto;

class ShowUserIdEventPsRequestDto extends BasePsRequestDto
{
    public string|null $status;
    public int|null $limit;
    public int|null $offset;
}
