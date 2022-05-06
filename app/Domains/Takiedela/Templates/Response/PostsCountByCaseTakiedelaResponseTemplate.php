<?php

namespace App\Domains\Takiedela\Templates\Response;

class PostsCountByCaseTakiedelaResponseTemplate
{
    public static array $remoteResponse = [
        0 => [
            "case_id" => "1",
            "articles" => 2
        ],
        1 => [
            "case_id" => "3",
            "articles" => 4
        ]
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
                "case_id" => "1",
                "articles" => 2
            ],
            1 => [
                "case_id" => "3",
                "articles" => 4
            ]
        ],
    ];

    public static array $structureResponse = [
        'data' => []
    ];
}
