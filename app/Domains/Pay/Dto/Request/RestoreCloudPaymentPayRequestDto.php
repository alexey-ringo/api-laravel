<?php

namespace App\Domains\Pay\Dto\Request;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;

class RestoreCloudPaymentPayRequestDto extends BasePayRequestDto
{
    public int $signup_id;
    //If new card
    public string|null $cryptogram;
    //If linked card
    public int|null $card_id;
    //'newcard' or 'card' value
//    public string $type_card;
    // String, user email for his id in our base
    public string $email;

    // Int, payment sum, default 50
    public int $sum;
    // Int, sum without donor commission, default 45
    public int|null $real_sum;
    // Int, default 1, number of case, fund_id or order_id
    public int $case_id;
    // Int, PS comment id, false
    public int|null $comment_id;
    // Int, Mathcing company id
    public int|null $matching_company;
    // Int, user id our base
    public int $user_id;
    // Int, account id our base
    public int|null $account_id;

    // Subscription start date
    public string|null $startdate;
    // Subscription start day
    public int|null $payday;
    // If you want to save card
    public bool|null $saveCard;
    // Advertising company id
    public int|null $rk;
    // If you want to save card, add card number
    //If new card!!!
    public string|null $cardNumber;
    //If new card!!!
    public string|null $cardName;

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
