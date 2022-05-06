<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class RequestYookassaPayRequestDto extends BasePayRequestDto
{
    // String, payment type (sberbank, alfabank, yoo_money)
    public string $action;
    // String, user email for his id in our base
    public string $email;

    // Int, payment sum, default 50
    public int|null $sum;
    // Int, sum without donor comission, default 45
    public int|null $real_sum;
    // Int, default 1, number of case, fund_id or order_id
    public int|null $case_id;
    // Int, PS comment id, false
    public int|null $comment_id;
    // Int, Mathcing company id, false
    public int|null $matching_company;
    // String, request author (shop, td, ps or something)
    public string|null $site;
    // String, request page url
    public string|null $ref;
    // String, user GA id
    public string|null $ga;
    // String, user IP
    public string|null $ip;
    // String, user name
    public string|null $firstname;
    // String, user lastname
    public string|null $lastname;
    // String, user phone
    public string|null $phone;
}
