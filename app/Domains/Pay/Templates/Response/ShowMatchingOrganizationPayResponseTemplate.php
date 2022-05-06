<?php

namespace App\Domains\Pay\Templates\Response;

class ShowMatchingOrganizationPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "data" => [
            "id" => 285,
            "user_id" => 266552,
            "name" => "",
            "logo" => null,
            "inn" => "1234567890",
            "kpp" => "",
            "bik" => "",
            "bank_name" => "",
            "account_correspondent" => "",
            "account_checking" => "",
            "bank_address" => "",
            "person" => "Алексей Кольцов",
            "email" => "superats@yandex.ru",
            "phone" => "+7 921 937-66-65",
            "status" => null,
            "flags" => null,
            "tags" => null,
            "sum" => 0
        ]
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "data" => [
            "id" => 285,
            "user_id" => 266552,
            "name" => "",
            "logo" => null,
            "inn" => "1234567890",
            "kpp" => "",
            "bik" => "",
            "bank_name" => "",
            "account_correspondent" => "",
            "account_checking" => "",
            "bank_address" => "",
            "person" => "Алексей Кольцов",
            "email" => "superats@yandex.ru",
            "phone" => "+7 921 937-66-65",
            "status" => null,
            "flags" => null,
            "tags" => null,
            "sum" => 0
        ]
    ];

    public static array $remoteResponseFail = [
        "status" => "Success",
        "message" => "Failure"
    ];

    public static array $outgoingResponseFail = [
        "status" => "Success",
        "message" => "Failure"
    ];

    public static array $structureResponse = [
        "data" => [
            "id",
            "user_id",
            "name",
            "logo",
            "inn",
            "kpp",
            "bik",
            "bank_name",
            "account_correspondent",
            "account_checking",
            "bank_address",
            "person",
            "email",
            "phone",
//            "status",
//            "flags",
//            "tags",
            "sum"
        ]
    ];
}
