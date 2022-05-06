<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class UpdateYookassaPayRequestDto extends BasePayRequestDto
{
    public int $id;
    public int|null $sum;
    public int|null $real_sum;
    public int|null $payday;
    public int|null $card_id;
    public int|null $case_id;
}
