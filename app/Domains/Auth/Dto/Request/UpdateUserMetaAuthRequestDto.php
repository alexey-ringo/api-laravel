<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class UpdateUserMetaAuthRequestDto extends BaseAuthRequestDto
{
    public string|null $firstname;
    public string|null $patronymic;
    public string|null $lastname;
}
