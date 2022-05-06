<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class ListUsersByIdsRequestDto extends BaseAuthRequestDto
{
    public array $ids;
}
