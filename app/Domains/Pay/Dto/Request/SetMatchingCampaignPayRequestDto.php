<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class SetMatchingCampaignPayRequestDto extends BasePayRequestDto
{
    public int|null $id;
    public int $user_id;
    public string|null $name;
    public string|null $max_sum;
    public string|null $recurrent;
    public string|null $email_domain;
    public string|null $text;
    public string|null $type;
    public array|null $cases;
    public string|null $target_id;
    public bool|null $activate;
    public string|null $status;
    public string|null $event_link;
    public string|null $start_campaign;
    public string|null $stop_campaign;
}
