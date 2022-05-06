<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class CreateCardPayRequestDto extends BasePayRequestDto
{
    public string $cryptogram;
    public string $email;
    public int $user_id;
    public string $cardNumber;
    public string $cardName;
    public string|null $site;
    // String, request page url
    public string $ref;
    // String, user GA id
    public string|null $cid;
    // String, user IP
    public string|null $ip;
    // String, user name
    public string|null $firstname;
    // String, user lastname
    public string|null $lastname;
    // String, user phone
    public string|null $phone;
}
