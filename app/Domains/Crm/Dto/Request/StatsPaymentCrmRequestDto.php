<?php

namespace App\Domains\Crm\Dto\Request;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;

class StatsPaymentCrmRequestDto extends BaseCrmRequestDto
{
    public array|null $cases;
    public array|null $promo;
}
