<?php

namespace App\Domains\Pay\Templates\Response;

class ListPaymentsByIdsResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "result" => [
            0 => [
                "id" => 1,
                "sum" => [
                    "sum" => 221950,
                    "real_sum" => 230000,
                    "full_sum" => 230000
                ],
                "cp" => [
                    "uuid" => "5ab6c231-16b0-4a0e-a929-7f05e058a72e"
                ],
                "case" => [
                    "id" => 9,
                    "name" => "Олег Бочкарев"
                ],
                "timestamp" => 1383248074,
                "removed" => 1383248074
            ],
            1 => [
                "id" => 2,
                "sum" => [
                    "sum" => 11580,
                    "real_sum" => 12000,
                    "full_sum" => 12000
                ],
                "cp" => [
                    "uuid" => "5ab6c231-16b0-4a0e-a929-7f05e058a72e"
                ],
                "case" => [
                    "id" => 4,
                    "name" => "Спар Кульянов. Учитель"
                ],
                "timestamp" => 1351712100,
                "removed" => 1351712100
            ],
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            0 => [
                "id" => 1,
                "sum" => [
                    "sum" => 221950,
                    "real_sum" => 230000,
                    "full_sum" => 230000
                ],
                "cp" => [
                    "uuid" => "5ab6c231-16b0-4a0e-a929-7f05e058a72e"
                ],
                "case" => [
                    "id" => 9,
                    "name" => "Олег Бочкарев"
                ],
                "timestamp" => 1383248074,
                "removed" => 1383248074
            ],
            1 => [
                "id" => 2,
                "sum" => [
                    "sum" => 11580,
                    "real_sum" => 12000,
                    "full_sum" => 12000
                ],
                "cp" => [
                    "uuid" => "5ab6c231-16b0-4a0e-a929-7f05e058a72e"
                ],
                "case" => [
                    "id" => 4,
                    "name" => "Спар Кульянов. Учитель"
                ],
                "timestamp" => 1351712100,
                "removed" => 1351712100
            ],
        ]
    ];

    public static array $structureResponse = [
        'status',
        'data'
    ];
}
