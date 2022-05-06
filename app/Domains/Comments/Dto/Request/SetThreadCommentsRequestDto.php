<?php

namespace App\Domains\Comments\Dto\Request;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;

class SetThreadCommentsRequestDto extends BaseCommentsRequestDto
{
    public int $user_id;
    public int $thread_id;
}
