<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class UpdateAllSettingRequestDto extends BaseAuthRequestDto
{
    public string $access_token;
    public string $lastname;
    public string $firstname;
    public string|null $patronymic;
    public string|null $birthday;
    public string|null $gender;
    public string $email;
    public string|null $country;
    public string|null $city;
    public string|null $index;
    public string|null $adress;
    public string|null $current_password;
    public string|null $password;
    public string|null $confirm_password;
    public string|null $avatar;
}
