<?php

namespace App\Domains\Crm\Dto\Base;

class RawCrmRequestDto extends BaseCrmRequestDto
{
    public bool $rawRequestIntoData = true;
    public array $requestData;
}
