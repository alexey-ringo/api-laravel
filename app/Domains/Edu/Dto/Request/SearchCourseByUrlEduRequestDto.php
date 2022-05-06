<?php

namespace App\Domains\Edu\Dto\Request;

use App\Domains\Edu\Dto\Base\BaseEduRequestDto;

class SearchCourseByUrlEduRequestDto extends BaseEduRequestDto
{
    public string $url;
}
