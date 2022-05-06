<?php

namespace App\Domains\Pay\Templates\Response;

class IndexPaymentPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => [
            "count" => 311,
            "data" => [
                0 => [
                    "id" => 19223970,
                    "case_name" => "Такие дела",
                    "case_url" => "https://nuzhnapomosh.ru/funds/takie-dela",
                    "case_id" => 2,
                    "date" => "22.12.21",
                    "status" => "success",
                    "status_title" => "Получен",
                    "sum" => "77.00",
                    "sum_int" => 77,
                    "payment_type" => "Банковская карта",
                    "payment_title" => "Ежемесячное",
                    "is_reccurent" => true,
                    "is_paid" => true,
                    "payments_type" => "NP",
                    "commission" => [
                        "procent" => 0,
                        "sum" => "0",
                        "full_sum" => "77"
                    ],
                    "currency" => [
                        "symbol" => "₽",
                        "text" => "RUB"
                    ],
                    "payment" => [
                        [
                            "type" => "Банковская карта",
                            "num" => "Банковская карта",
                            "sum" => "77.00",
                            "sum_int" => "77.00"
                        ]
                    ],
                    "foreign" => false,
                    "foreign_type" => false
                ],
                1 => [
                    "id" => 18056064,
                    "case_name" => "Спортивная площадка для бездомных с инвалидностью",
                    "case_url" => "https://nuzhnapomosh.ru/funds/sportivnaya-ploshhadka-dlya-bezdomnykh",
                    "case_id" => 519,
                    "date" => "26.08.21",
                    "status" => "error",
                    "status_title" => "Ошибка перевода",
                    "sum" => "12.00",
                    "sum_int" => 12,
                    "payment_type" => "Банковская карта",
                    "payment_title" => "Однократное",
                    "is_reccurent" => false,
                    "is_paid" => false,
                    "payments_type" => "TD",
                    "commission" => [
                        "procent" => 20,
                        "sum" => "2",
                        "full_sum" => "12"
                    ],
                    "currency" => [
                        "symbol" => "P",
                        "text" => "RUB",
                    ],
                    "payment" => [
                        [
                            "type" => "Банковская карта",
                            "num" => "Банковская карта",
                            "sum" => "10.00",
                            "sum_int" => "10.00"
                        ]
                    ],
                    "foreign" => false,
                    "foreign_type" => false
                ],
            ],
        ]
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
                "id" => 19223970,
                "case_name" => "Такие дела",
                "case_url" => "https://nuzhnapomosh.ru/funds/takie-dela",
                "case_id" => 2,
                "date" => "22.12.21",
                "status" => "success",
                "status_title" => "Получен",
                "sum" => "77.00",
                "currency" => [
                    "symbol" => "₽",
                    "text" => "RUB"
                ],
                "sum_int" => 77,
                "payment_type" => "Банковская карта",
                "payment_title" => "Ежемесячное",
                "is_recurrent" => true,
                "is_paid" => true,
                "payments_type" => "NP",
                "commission" => [
                    "percent" => 0,
                    "sum" => "0",
                    "full_sum" => "77"
                ],
                "payment" => [
                    [
                        "type" => "Банковская карта",
                        "num" => "Банковская карта",
                        "sum" => "77.00",
                        "sum_int" => "77.00"
                    ]
                ],
                "foreign" => false,
                "foreign_type" => false
            ],
            1 => [
                "id" => 18056064,
                "case_name" => "Спортивная площадка для бездомных с инвалидностью",
                "case_url" => "https://nuzhnapomosh.ru/funds/sportivnaya-ploshhadka-dlya-bezdomnykh",
                "case_id" => 519,
                "date" => "26.08.21",
                "status" => "error",
                "status_title" => "Ошибка перевода",
                "sum" => "12.00",
                "currency" => [
                    "symbol" => "P",
                    "text" => "RUB",
                ],
                "sum_int" => 12,
                "payment_type" => "Банковская карта",
                "payment_title" => "Однократное",
                "is_recurrent" => false,
                "is_paid" => false,
                "payments_type" => "TD",
                "commission" => [
                    "percent" => 20,
                    "sum" => "2",
                    "full_sum" => "12"
                ],
                "payment" => [
                    [
                        "type" => "Банковская карта",
                        "num" => "Банковская карта",
                        "sum" => "10.00",
                        "sum_int" => "10.00"
                    ]
                ],
                "foreign" => false,
                "foreign_type" => false
            ]
        ],
        'count' => 311
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
        'data' => [
            [
                "id",
                "case_name",
                "case_url",
                "case_id",
                "date",
                "status",
                "status_title",
                "sum",
                "currency" => [
                    "symbol",
                    "text",
                ],
                "sum_int",
                "payment_type",
                "payment_title",
                "is_recurrent",
                "is_paid",
                "payments_type",
                "commission" => [
                    "percent",
                    "sum",
                    "full_sum"
                ],
                "payment" => [
                    [
                        "type",
                        "num",
                        "sum",
                        "sum_int"
                    ]
                ],
                "foreign",
                "foreign_type"
            ]
        ],
        "count"
    ];
}
