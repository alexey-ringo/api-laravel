<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class FetchOrRegAuthRequestDto extends BaseAuthRequestDto
{
    public string $email;
}
