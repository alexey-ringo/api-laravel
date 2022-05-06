<?php

namespace App\Domains\Crm\Templates\Response;

class StatsPaymentCrmResponseTemplate
{
    public static array $remoteResponse = [
        "data" => [
            "cases" => [
                0 => [
                    "donors" => 9137,
                    "donates" => 116345258,
                    "case_id" => 2
                ]
            ],
            "promo" => []
        ],
        "total" => [
            "cases" => [
                [
                    "donors" => 9137,
                    "donates" => 116345258
                ]
            ],
            "promo" => [
                "donors" => 0,
                "donates" => 0
            ]
        ]
//        "data" => [
//            0 => [
//            "case_id" => 12,
//            "donors" => 1234,
//            "donates" => 12345678
//            ],
//            1 => [
//                "case_id" => 2,
//                "donors" => 222,
//                "donates" => 333333
//            ],
//        ],
//        "additional" => []

    ];

    public static array $outgoingResponse = [
        "data" => [
            "cases" => [
                0 => [
                    "donors" => 9137,
                    "donates" => 116345258,
                    "case_id" => 2
                ]
            ],
            "promo" => []
        ],
        "total" => [
            "cases" => [
                [
                    "donors" => 9137,
                    "donates" => 116345258
                ]
            ],
            "promo" => [
                "donors" => 0,
                "donates" => 0
            ]
        ]
//        "data" => [
//            0 => [
//                "case_id" => 12,
//                "donors" => 1234,
//                "donates" => 12345678
//            ],
//            1 => [
//                "case_id" => 2,
//                "donors" => 222,
//                "donates" => 333333
//            ],
//        ],
//        "additional" => []
    ];

    public static array $structureResponse = [
        "data" => [
            "cases" => [
                [
                    "donors",
                    "donates",
                    "case_id"
                ]
            ],
            "promo" => []
        ],
        "total" => [
            "cases" => [
                [
                    "donors",
                    "donates"
                ]
            ],
            "promo" => [
                "donors",
                "donates"
            ]
        ]
//        'data' => [
//            [
//                "case_id" => 12,
//                "donors" => 1234,
//                "donates" => 12345678
//            ],
//        ],
//        "additional"
    ];
}
