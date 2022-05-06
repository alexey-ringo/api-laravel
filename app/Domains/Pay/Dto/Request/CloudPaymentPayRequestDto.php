<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class CloudPaymentPayRequestDto extends BasePayRequestDto
{
    public string $cryptogram;
    // String, user email for his id in our base
    public string $email;
    // Boolean, false if once payments, true if subcription
    public bool $regular;

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
    // Int, user id our base
    public int|null $user_id;
    // Int, account id our base
    public int|null $account_id;

    // Subcription start date
    public string|null $startdate;
    // If you want to save card
    public bool|null $saveCard;
    // Advertising company id
    public int|null $rk;
    // If you want to save card, add card number
    public string $cardNumber;


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
