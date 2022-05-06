<?php

namespace App\Domains\Takiedela\Dto\Request;

use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;

class PostsTakiedelaRequestDto extends BaseTakiedelaRequestDto
{
    public int|null $limit;
    public int|null $offset;
    public int|null $case_id;
    public int|null $from;
    public int|null $to;
    public string|null $orderby;
    public string|null $order;
}
