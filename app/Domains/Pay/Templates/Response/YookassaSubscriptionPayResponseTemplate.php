<?php

namespace App\Domains\Pay\Templates\Response;

class YookassaSubscriptionPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => "OK",
        "data" => [
            "id" => 711072,
            "case" => [
                "id" => 2,
                "name" => "Такие дела",
                "img" => "https://takiedela.ru/wp-content/uploads/2017/08/td-333x240.jpg",
                "desc" => "",
                "url" => "https://nuzhnapomosh.ru/funds/item/2",
                "removed" => false
            ],
            "master_id" => 0,
            "sum" => "71.00",
            "provider" => "cp",
            "start_date" => "15.11.2021",
            "payment_date" => "08.12.2021",
            "payment_sum" => "71.00",
            "full_sum" => "71.00",
            "payday" => 8,
            "data" => [
                "case_id" => 2,
                "ref" => "https://office.npmsh.local/payments/recurrent#",
                "ip" => "172.27.0.1",
                "phone" => "79112223322",
                "card" => 51142,
                "real_sum" => 71,
                "day" => 8,
                "time" => "01:07"
            ],
            "signup" => [
                "active" => true,
                "delete" => false
            ],
            "commission" => [
                "procent" => 0,
                "sum" => 0,
                "full_sum" => "71.00"
            ],
            "change" => true,
            "payment" => [
                "status" => "success",
                "name" => "Не выполнен",
                "card" => [
                    "id" => 51142,
                    "type" => "Карта",
                    "title" => "Последний платеж",
                    "number" => "MasterCard xxxx-4444",
                    "time" => "active"
                ],
                "type" => "card"
            ],
            "foreign" => false,
            "foreign_type" => "Некоммерческая организация, выполняющей функции иностранного агента",
            "matching" => false,
            "donations" => []
        ]
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "message" => "OK",
        "data" => [
            "id" => 711072,
            "case" => [
                "id" => 2,
                "name" => "Такие дела",
                "img" => "https://takiedela.ru/wp-content/uploads/2017/08/td-333x240.jpg",
                "desc" => "",
                "url" => "https://nuzhnapomosh.ru/funds/item/2",
                "removed" => false
            ],
            "master_id" => 0,
            "sum" => "71.00",
            'currency' => [
                'symbol' => '₽',
                'text' => 'RUB'
            ],
            "provider" => "cp",
            "start_date" => "15.11.2021",
            "payment_date" => "08.12.2021",
            "payment_sum" => "71.00",
            "full_sum" => "71.00",
            "payday" => 8,
            "data" => [
                "case_id" => 2,
                "ref" => "https://office.npmsh.local/payments/recurrent#",
                "ip" => "172.27.0.1",
                "phone" => "79112223322",
                "card" => 51142,
                "real_sum" => 71,
                "day" => 8,
                "time" => "01:07"
            ],
            "signup" => [
                "active" => true,
                "delete" => false
            ],
            "commission" => [
                "percent" => 0,
                "sum" => 0,
                "full_sum" => "71.00"
            ],
            "change" => true,
            "payment" => [
                "status" => "success",
                "name" => "Не выполнен",
                "card" => [
                    "id" => 51142,
                    "type" => "Карта",
                    "title" => "Последний платеж",
                    "number" => "MasterCard xxxx-4444",
                    "time" => "active"
                ],
                "type" => "card"
            ],
            "foreign" => false,
            "foreign_type" => "Некоммерческая организация, выполняющей функции иностранного агента",
            "matching" => false,
            "donations" => []
        ],
    ];

    public static array $structureResponse = [
        'status',
        'message',
        'data'
    ];
}
