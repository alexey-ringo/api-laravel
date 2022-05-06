<?php

namespace App\Domains\Crm\Dto\Request;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;

class SearchPaymentCrmRequestDto extends BaseCrmRequestDto
{
    public array|null $filters;
    public int|null $aggregates;
    public int|null $page;
    public int|null $perPage;
    public bool|null $additional;
}
