<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class UpdateUserAuthAuthRequestDto extends BaseAuthRequestDto
{
    public string|null $email;
    public string|null $phone;
    public string|null $provider;
    public string|null $social_id;
    public bool|null $email_verified;
    public bool|null $phone_verified;
    public string $update_type;
}
