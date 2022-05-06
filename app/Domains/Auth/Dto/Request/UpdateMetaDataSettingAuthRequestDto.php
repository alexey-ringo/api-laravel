<?php

namespace App\Domains\Auth\Dto\Request;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class UpdateMetaDataSettingAuthRequestDto extends BaseAuthRequestDto
{
    public string $access_token;
    public string $lastname;
    public string $firstname;
    public string|null $patronymic;
    public string|null $birthday;
    public string|null $gender;
    public string|null $country;
    public string|null $city;
    public string|null $index;
    public string|null $adress;
    public string|null $avatar;
}
