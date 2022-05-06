<?php

namespace App\Domains\Sluchaem\Dto;

use App\Domains\Sluchaem\Dto\Base\AbstractSluchaemRequestDto;

class CollectionSluchaemRequestDto extends AbstractSluchaemRequestDto
{
    public int|null $page;
    public int|null $limit;
    public int|null $offset;
    public string|null $order;
    public array|null $category;
    public int|array|null $inn;
    public string|null $get_all;
    public string|null $active;
}
