<?php

namespace App\Domains\Comments\Dto\Request;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;

class UpdateCommentCommentsRequestDto extends BaseCommentsRequestDto
{
    public string $body;
}
