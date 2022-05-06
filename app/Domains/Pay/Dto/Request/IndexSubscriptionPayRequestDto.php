<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class IndexSubscriptionPayRequestDto extends BasePayRequestDto
{
    public int $user_id;
    public int|null $limit;
    public int|null $offset;
    public string|bool|null $active;
    public array|null $case;
    public string|null $name;
}
