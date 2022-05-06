<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class SetMatchingOrganizationPayRequestDto extends BasePayRequestDto
{
    public int $user_id;
    public string|null $name;
    public string|null $logo;
    public string $inn;
    public string|null $kpp;
    public string|null $bik;
    public string|null $bank_name;
    public string|null $account_correspondent;
    public string|null $account_checking;
    public string|null $bank_address;
    public string|null $person;
    public string $email;
    public string|null $phone;
    public string|null $status;
    public string|null $flags;
    public string|null $tags;
    public int|null $sum;
}
