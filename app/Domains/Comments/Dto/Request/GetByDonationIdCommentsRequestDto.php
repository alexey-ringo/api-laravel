<?php

namespace App\Domains\Comments\Dto\Request;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;

class GetByDonationIdCommentsRequestDto extends BaseCommentsRequestDto
{
    public array $ids;
}
