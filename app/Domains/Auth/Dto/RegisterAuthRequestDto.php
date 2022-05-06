<?php

namespace App\Domains\Auth\Dto;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;

class RegisterAuthRequestDto extends BaseAuthRequestDto
{
    public string|array|null $email;
    public string|null $password;
    public string|null $phone;
    public string|null $firstname;
    public string|null $patronymic;
    public string|null $lastname;
    public bool|null $login;
    public array|null $notification;
    public string|null $referer;
    public array|null $users;
}
