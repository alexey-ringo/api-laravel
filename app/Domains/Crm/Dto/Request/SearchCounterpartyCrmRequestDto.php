<?php

namespace App\Domains\Crm\Dto\Request;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;

class SearchCounterpartyCrmRequestDto extends BaseCrmRequestDto
{
    public string|null $email;
    public string|null $phone;
    public string|null $model_type;
}
