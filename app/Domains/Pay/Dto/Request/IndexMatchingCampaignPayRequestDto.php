<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class IndexMatchingCampaignPayRequestDto extends BasePayRequestDto
{
    public int $user_id;
    public int|null $limit;
    public int|null $offset;
    public string|null $data_from;
    public string|null $data_to;
    public array|null $status;
}
