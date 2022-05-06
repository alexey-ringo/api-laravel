<?php

namespace App\Domains\Pay\Templates\Response;

class IndexSubscriptionPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => [
            "data" => [
                0 => [
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
                ],
                1 => [
                    "id" => 711071,
                    "case" => [
                        "id" => 211,
                        "name" => "Передышка плюс",
                        "img" => "https://takiedela.ru/wp-content/uploads/2017/08/td-333x240.jpg",
                        "desc" => "Принимающие семьи помогают родителям взрослых людей с инвалидностью",
                        "url" => "https://nuzhnapomosh.ru/funds/item/211",
                        "removed" => false
                    ],
                    "master_id" => 0,
                    "sum" => "59.00",
                    "provider" => "cp",
                    "start_date" => "15.11.2021",
                    "payment_date" => "08.12.2021",
                    "payment_sum" => "65.00",
                    "full_sum" => "65.00",
                    "payday" => 8,
                    "data" => [
                        "case_id" => 211,
                        "ref" => "https://office.npmsh.local/payments/recurrent#",
                        "ip" => "172.27.0.1",
                        "phone" => "79112223322",
                        "card" => 51142,
                        "real_sum" => 59,
                        "day" => 8,
                        "time" => "00:37"
                    ],
                    "signup" => [
                        "active" => true,
                        "delete" => false
                    ],
                    "commission" => [
                        "procent" => "10",
                        "sum" => "6",
                        "full_sum" => "65.00"
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
                    "foreign_type" => "Проект некоммерческой организации, выполняющей функции иностранного агента",
                    "matching" => false,
                    "donations" => []
                ],
            ],
            'count' => 1
        ]
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
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
            1 => [
                "id" => 711071,
                "case" => [
                    "id" => 211,
                    "name" => "Передышка плюс",
                    "img" => "https://takiedela.ru/wp-content/uploads/2017/08/td-333x240.jpg",
                    "desc" => "Принимающие семьи помогают родителям взрослых людей с инвалидностью",
                    "url" => "https://nuzhnapomosh.ru/funds/item/211",
                    "removed" => false
                ],
                "master_id" => 0,
                "sum" => "59.00",
                'currency' => [
                    'symbol' => '₽',
                    'text' => 'RUB'
                ],
                "provider" => "cp",
                "start_date" => "15.11.2021",
                "payment_date" => "08.12.2021",
                "payment_sum" => "65.00",
                "full_sum" => "65.00",
                "payday" => 8,
                "data" => [
                    "case_id" => 211,
                    "ref" => "https://office.npmsh.local/payments/recurrent#",
                    "ip" => "172.27.0.1",
                    "phone" => "79112223322",
                    "card" => 51142,
                    "real_sum" => 59,
                    "day" => 8,
                    "time" => "00:37"
                ],
                "signup" => [
                    "active" => true,
                    "delete" => false
                ],
                "commission" => [
                    "percent" => 10,
                    "sum" => "6",
                    "full_sum" => "65.00"
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
                "foreign_type" => "Проект некоммерческой организации, выполняющей функции иностранного агента",
                "matching" => false,
                "donations" => []
            ],
        ],
        'count' => 1
    ];

    public static array $remoteResponseFail = [
        "status" => "Success",
        "message" => [
            "count" => 0,
            "data" => []
        ]
    ];

    public static array $outgoingResponseFail = [
        "count" => 0,
        "data" => []
    ];

    public static array $structureResponse = [
        'data' => []
    ];
}
