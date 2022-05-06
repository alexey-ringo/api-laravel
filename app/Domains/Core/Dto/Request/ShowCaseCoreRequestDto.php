<?php

namespace App\Domains\Core\Dto\Request;

use App\Domains\Core\Dto\Base\BaseCoreRequestDto;

class ShowCaseCoreRequestDto extends BaseCoreRequestDto
{
    public string|null $fields;
    public string|null $extra_fields;
}
