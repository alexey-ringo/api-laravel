<?php

namespace App\Domains\Takiedela\Templates\Response;

class GetDonateReportsTakiedelaResponseTemplate
{
    public static array $remoteResponse = [
        0 => [
            "ID" => "266861",
            "post_date" => "2021-08-28 13:41:30",
            "post_title" => "Фонд Чижовой. Выездная детская паллиативная служба Чувашии_август 2021",
            "meta_value" => "401"
        ],
        1 => [
            "ID" => "266862",
            "post_date" => "2021-08-28 13:41:30",
            "post_title" => "Фонд Чижовой2. Выездная детская паллиативная служба2 Чувашии_август 2022",
            "meta_value" => "402"
        ],
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
                "id" => 266861,
                "post_date" => "2021-08-28 13:41:30",
                "post_title" => "Фонд Чижовой. Выездная детская паллиативная служба Чувашии_август 2021",
                "meta_value" => 401
            ],
            1 => [
                "id" => 266862,
                "post_date" => "2021-08-28 13:41:30",
                "post_title" => "Фонд Чижовой2. Выездная детская паллиативная служба2 Чувашии_август 2022",
                "meta_value" => 402
            ],
        ],
    ];

    public static array $structureResponse = [
        'data' => [
            [
                "id",
                "post_date",
                "post_title",
                "meta_value",
            ]
        ]
    ];
}
