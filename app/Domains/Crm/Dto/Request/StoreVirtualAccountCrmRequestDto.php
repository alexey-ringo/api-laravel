<?php

namespace App\Domains\Crm\Dto\Request;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;

class StoreVirtualAccountCrmRequestDto extends BaseCrmRequestDto
{
    public int $case_id;
    public int|null $payment_type;
    public int|null $payment_subtype;
}
