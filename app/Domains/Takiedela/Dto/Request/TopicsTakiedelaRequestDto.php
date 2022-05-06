<?php

namespace App\Domains\Takiedela\Dto\Request;

use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;

class TopicsTakiedelaRequestDto extends BaseTakiedelaRequestDto
{
    public array|null $case_id;
}
