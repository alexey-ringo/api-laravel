<?php

namespace App\Domains\Comments\Dto\Request;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;

class CreateCommentCommentsRequestDto extends BaseCommentsRequestDto
{
    public string|null $body;
    public int|null $user_id;
    public int|null $parent_id;
    public string $email;
    public string|null $first_name;
    public string|null $last_name;
    public string|null $phone;
    public int|null $donation_id;
    public bool|null $hidden_sum;
    public string|null $utm_source;
    public string|null $utm_medium;
    public string|null $utm_campaign;
    public string|null $utm_referer;
    public string $project;
    public string $resource_type;
    public int $resource_id;
}
