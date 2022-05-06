<?php

namespace App\Domains\Crm\Templates\Response;

class AnnualUserReportCrmResponseTemplate
{
    public static array $remoteResponse = [
        "data" => [
            "uuid" => "099450ee-b1f2-4a5d-85df-c70c863e20af",
            "year" => 2021,
            "user" => [
                "fullname" => "Ater2",
                "register_at" => "2021-08-30T12:22:30.000000Z",
                "first_donation" => "2021-08-30T14:35:21.000000Z"
            ],
            "donations" => [
                "count" => 14,
                "sum" => 420
            ],
            "events" => [
                "count" => 0,
                "sum" => 0
            ],
            "football_part" => false,
            "has_td_donations" => false,
            "has_sat_subscription" => false,
            "is_info_volunteer" => false,
            "funds" => [
                0 => [
                    "id" => 157,
                    "name" => "Динго",
                    "url" => "http://fond-dingo.ru/",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
                1 => [
                    "id" => 207,
                    "name" => "Экология человека",
                    "url" => "https://ecozoo.ru/",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
            ],
            "cases" => [
                0 => [
                    "id" => 299,
                    "name" => "Динго",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
                1 => [
                    "id" => 369,
                    "name" => "Экология человека",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
            ],
            'problems' => []
        ],
    ];

    public static array $outgoingResponse = [
        "data" => [
            "uuid" => "099450ee-b1f2-4a5d-85df-c70c863e20af",
            "year" => 2021,
            "user" => [
                "fullname" => "Ater2",
                "register_at" => "2021-08-30T12:22:30.000000Z",
                "first_donation" => "2021-08-30T14:35:21.000000Z"
            ],
            "donations" => [
                "count" => 14,
                "sum" => 420
            ],
            "events" => [
                "count" => 0,
                "sum" => 0
            ],
            "football_part" => false,
            "has_td_donations" => false,
            "has_sat_subscription" => false,
            "is_info_volunteer" => false,
            "funds" => [
                0 => [
                    "id" => 157,
                    "name" => "Динго",
                    "url" => "http://fond-dingo.ru/",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
                1 => [
                    "id" => 207,
                    "name" => "Экология человека",
                    "url" => "https://ecozoo.ru/",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
            ],
            "cases" => [
                0 => [
                    "id" => 299,
                    "name" => "Динго",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
                1 => [
                    "id" => 369,
                    "name" => "Экология человека",
                    "donations" => [
                        "count" => 2,
                        "sum" => 60
                    ]
                ],
            ],
            'problems' => []
        ],
    ];

    public static array $structureResponse = [
        'data' => [
        ]
    ];
}
