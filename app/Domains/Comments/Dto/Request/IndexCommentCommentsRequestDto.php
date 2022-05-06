<?php

namespace App\Domains\Comments\Dto\Request;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;

class IndexCommentCommentsRequestDto extends BaseCommentsRequestDto
{
    public string $project;
    public string $resource_type;
    public int $resource_id;
}
