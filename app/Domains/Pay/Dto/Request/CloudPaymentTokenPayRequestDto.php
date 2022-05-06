<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class CloudPaymentTokenPayRequestDto extends BasePayRequestDto
{
    public string $token;

    public int $user_id;
    public int $card_id;
    // String, user email for his id in our base
    public string $email;

    // Boolean, false if once payments, true if subcription
    public bool|null $regular;
    // Int, account id our base, if null get email
    public int|null $account_id;
    // Int, payment sum, default 50
    public int|null $sum;
    // Int, sum without donor comission, default 45
    public int|null $real_sum;
    // Int, default 1, number of case, fund_id or order_id
    public int|null $case_id;
    // Int, PS comment id, false
    public int|null $comment_id;
    // Int, Mathcing company id
    public int|null $matching_company;
    // Subcription start date
    public $startdate;
    public int|null $payday;
    // Advertising company id
    public int|null $rk;
    // String, request author (shop, td, ps or something)
    public string|null $site;
    // String, request page url
    public string|null $ref;
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
