<?php

namespace App\Domains\Core\Templates\Response;

class ShowCaseCoreResponseTemplate
{
    public static array $remoteResponse = [
        "id" => 13,
        "remote_id" => null,
        "fund_id" => 227,
        "application_id" => 14,
        "uuid" => "aef7e211-7004-490c-abd5-c282f49583d0",
        "name" => "Лига справедливости имени В.И. Ленина",
        "name_dat" => "Лиге Справедливости имени В.И. Ленина",
        "name_rod" => "Лигу Справедливости имени В.И. Ленина",
        "description" => "Описание проекта для переводов",
        "problems" => [
            0 => [
                "id" => 1004,
                "name" => "Другие социальные проблемы",
                "groups" => [
                    0 => [
                        "id" => 2,
                        "name" => "Бедность",
                        "groups" => []
                    ],
                    1 => [
                        "id" => 3,
                        "name" => "Бездомность",
                        "groups" => []
                    ],
                    2 => [
                        "id" => 6,
                        "name" => "Военные конфликты и последствия",
                        "groups" => []
                    ]
                ]
            ]
        ],
        "date_close" => "2022-01-20T00:00:00.000000Z",
        "external" => false,
        "statutory" => false,
        "status" => "close",
        "target_sum" => 15000000,
        "slug" => "liga-spravedlivosti-imeni-vi-lenina",
        "forever" => 1,
        "deleted_at" => null,
        "created_at" => "2022-01-19T11:56:32.000000Z",
        "updated_at" => "2022-01-20T07:39:37.000000Z",

        "carousel" => null,
        "slider" => null,

        "lead" => null,
        "full_description" => null,
        "final_text_report" => null,
        "image" => null,
        "estimate" => null,
        "documents" => null,
        "final_financial_report" => null,
    ];

    public static array $outgoingResponse = [
        "data" => [
            "id" => 13,
            "remote_id" => null,
            "fund_id" => 227,
            "application_id" => 14,
            "uuid" => "aef7e211-7004-490c-abd5-c282f49583d0",
            "name" => "Лига справедливости имени В.И. Ленина",
            "name_dat" => "Лиге Справедливости имени В.И. Ленина",
            "name_rod" => "Лигу Справедливости имени В.И. Ленина",
            "description" => "Описание проекта для переводов",
            "problems" => [
                0 => [
                    "id" => 1004,
                    "name" => "Другие социальные проблемы",
                    "groups" => [
                        0 => [
                            "id" => 2,
                            "name" => "Бедность",
                            "groups" => []
                        ],
                        1 => [
                            "id" => 3,
                            "name" => "Бездомность",
                            "groups" => []
                        ],
                        2 => [
                            "id" => 6,
                            "name" => "Военные конфликты и последствия",
                            "groups" => []
                        ]
                    ]
                ]
            ],
            "date_close" => "2022-01-20T00:00:00.000000Z",
            "external" => false,
            "statutory" => false,
            "status" => "close",
            "target_sum" => 15000000,
            "slug" => "liga-spravedlivosti-imeni-vi-lenina",
            "forever" => 1,
            "deleted_at" => null,
            "created_at" => "2022-01-19T11:56:32.000000Z",
            "updated_at" => "2022-01-20T07:39:37.000000Z",

            "carousel" => null,
            "slider" => null,

            "lead" => null,
            "full_description" => null,
            "final_text_report" => null,
            "image" => null,
            "estimate" => null,
            "documents" => null,
            "final_financial_report" => null,
        ],
    ];

    public static array $structureResponse = [
        "data" => [

        ]
    ];
}
