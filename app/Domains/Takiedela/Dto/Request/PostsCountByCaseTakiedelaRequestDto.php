<?php

namespace App\Domains\Takiedela\Dto\Request;

use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;

class PostsCountByCaseTakiedelaRequestDto extends BaseTakiedelaRequestDto
{
    public array $case_id;
}
