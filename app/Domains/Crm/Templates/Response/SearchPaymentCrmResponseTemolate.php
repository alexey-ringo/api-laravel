<?php

namespace App\Domains\Crm\Templates\Response;

class SearchPaymentCrmResponseTemolate
{
    public static array $remoteResponse = [
        "data" => [
            "sum" => 107403.97,
            "full_sum" => 110222,
            "real_sum" => 107403.97,
            "count" => 13
        ],
        "filters" => [
            "dateCreated" => [
                "useRealDate" => true,
                "from" => "01.01.2015",
                "till" => "01.02.2015"
            ],
            "type" => "in",
            "currency" => "RUB",
            "succeed" => "true",
            "recurrent" => "all",
            "case" => [
                "__list" => [
                    "24",
                    "31"
                ]
            ]
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            "sum" => 107403.97,
            "full_sum" => 110222,
            "real_sum" => 107403.97,
            "count" => 13
        ],
        "filters" => [
            "dateCreated" => [
                "useRealDate" => true,
                "from" => "01.01.2015",
                "till" => "01.02.2015"
            ],
            "type" => "in",
            "currency" => "RUB",
            "succeed" => "true",
            "recurrent" => "all",
            "case" => [
                "__list" => [
                    "24",
                    "31"
                ]
            ]
        ]
    ];

    public static array $structureResponse = [
        'data' => [
            'sum',
            'full_sum',
            'real_sum',
            'count',
        ]
    ];
}
