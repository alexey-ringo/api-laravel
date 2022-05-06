<?php

namespace App\Domains\Crm\Templates\Response;

class SubscriptionUpgradeCounterpartyCrmResponseTemplate
{
    public static array $remoteResponse = [
        "data" => [
            0 => [
                "id" => 5053,
                "case" => [
                    "id" => 1,
                    "name" => "Название сбора",
                    "created_at" => "2013-11-01T04:18:00.000000Z",
                    "closed_at" => null
                ],
                "date_timestamp" => "2015-01-31T14:03:27.000000Z",
                "sum" => [
                    "sum" => 500,
                    "real_sum" => 500,
                    "upgraded" => 700
                ]
            ],
            1 => [
                "id" => 5053,
                "case" => [
                    "id" => 1,
                    "name" => "Название сбора",
                    "created_at" => "2013-11-01T04:18:00.000000Z",
                    "closed_at" => "2013-11-01T04:18:00.000000Z"
                ],
                "date_timestamp" => "2015-01-31T14:03:27.000000Z",
                "sum" => [
                    "sum" => 500,
                    "real_sum" => 500,
                    "upgraded" => 700
                ]
            ],
        ],
        "uuid" => "1FB55105-C8DA-4C4D-ADB4-AEED83E32CA0",
        "state" => "VISITED",
        "counterparty" => [
            "id" => "0566B1EA-174C-441B-B4ED-C3475A9C66A3"
        ],
        "builder" => [
            "id" => 1,
            "state" => "SENT"
        ],
        "views" => 1,
        "expired" => false
    ];

    public static array $outgoingResponse = [
        "data" => [
            0 => [
                "id" => 5053,
                "case" => [
                    "id" => 1,
                    "name" => "Название сбора",
                    "created_at" => "2013-11-01T04:18:00.000000Z",
                    "closed_at" => null
                ],
                "date_timestamp" => "2015-01-31T14:03:27.000000Z",
                "sum" => [
                    "sum" => 500,
                    "real_sum" => 500,
                    "upgraded" => 700
                ]
            ],
            1 => [
                "id" => 5053,
                "case" => [
                    "id" => 1,
                    "name" => "Название сбора",
                    "created_at" => "2013-11-01T04:18:00.000000Z",
                    "closed_at" => "2013-11-01T04:18:00.000000Z"
                ],
                "date_timestamp" => "2015-01-31T14:03:27.000000Z",
                "sum" => [
                    "sum" => 500,
                    "real_sum" => 500,
                    "upgraded" => 700
                ]
            ],
        ],
        "uuid" => "1FB55105-C8DA-4C4D-ADB4-AEED83E32CA0",
        "state" => "VISITED",
        "counterparty" => [
            "id" => "0566B1EA-174C-441B-B4ED-C3475A9C66A3"
        ],
        "builder" => [
            "id" => 1,
            "state" => "SENT"
        ],
        "views" => 1,
        "expired" => false
    ];

    public static array $structureResponse = [
        "data" => [
            [
                "id",
                "case" => [
                    "id",
                    "name",
                    "created_at",
                    "closed_at"
                ],
                "date_timestamp",
                "sum" => [
                    "sum",
                    "real_sum",
                    "upgraded"
                ]
            ],
        ],
        "uuid",
        "state",
        "counterparty" => [
            "id"
        ],
        "builder" => [
            "id",
            "state"
        ],
        "views",
        "expired"
    ];
}
