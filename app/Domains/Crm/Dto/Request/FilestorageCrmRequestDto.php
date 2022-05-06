<?php

namespace App\Domains\Crm\Dto\Request;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;

class FilestorageCrmRequestDto extends BaseCrmRequestDto
{
    public string $url;
    public string $provider;
    public array|null $meta;
}
