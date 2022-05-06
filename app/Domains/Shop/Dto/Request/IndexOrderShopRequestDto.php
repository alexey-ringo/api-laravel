<?php

namespace App\Domains\Shop\Dto\Request;

use App\Domains\Shop\Dto\Request\Base\AbstractOrderShopRequestDto;

class IndexOrderShopRequestDto extends AbstractOrderShopRequestDto
{
    public int|null $limit;
    public int|null $offset;
}
