<?php

namespace App\Domains\Core\Dto\Request;

use App\Domains\Core\Dto\Base\BaseCoreRequestDto;

class IndexCaseCoreRequestDto extends BaseCoreRequestDto
{
    public string|null $fields;
    public string|null $extra_fields;
    public string|null $filter;
    public string|null $sort;
    public int|null $limit;
    public int|null $offset;
    public int|null $paginate;
    public int|null $page;
}
