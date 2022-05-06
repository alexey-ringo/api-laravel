<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class IndexPaymentPayRequestDto extends BasePayRequestDto
{
    public int $user_id;
    public string|bool|null $type;
    public int|null $limit;
    public int|null $offset;
    public string|null $filter;
    public string|null $search;
    public string|null $only_signup;
}
