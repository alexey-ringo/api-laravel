<?php

namespace App\Domains\Tochnost\Dto\Request;

use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;

class SearchProblemsOrganizationsTochnostRequestDto extends BaseTochnostRequestDto
{
    public string|null $type;
    public array|null $inns;
    public string|null $inn;
    public string|null $ogrn;
    public string|null $kpp;
    public string|null $full_name;
    public array|null $problems;
}
