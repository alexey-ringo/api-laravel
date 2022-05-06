<?php

namespace App\Domains\Pay\Templates\Response;

class ListSimplePaymentsByIdsResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "result" => [
            "1" => [
                "full_sum" => 230000,
            ],
            "2" => [
                "full_sum" => 12000,
            ],
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            "1" => [
                "full_sum" => 230000,
            ],
            "2" => [
                "full_sum" => 12000,
            ],
        ]
    ];

    public static array $structureResponse = [
        'status',
        'data'
    ];
}
