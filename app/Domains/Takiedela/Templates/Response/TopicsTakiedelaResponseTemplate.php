<?php

namespace App\Domains\Takiedela\Templates\Response;

class TopicsTakiedelaResponseTemplate
{
    public static array $remoteResponse = [
        "count" => 4,
        "topics" => [
            [
                'case_id' => 49,
                'url' => 'https://takiedela.ru/topics/sisters/'
            ],
            [
                'case_id' => 20,
                'url' => 'https://takiedela.ru/topics/charity-depot/'
            ],
            [
                'case_id' => 15,
                'url' => 'https://takiedela.ru/topics/bbbs/'
            ],
            [
                'case_id' => 10,
                'url' => 'https://takiedela.ru/topics/online-education/'
            ]
        ],
        "status" => 200
    ];

    public static array $fakeResponse = [];

    public static array $structureResponse = [
        "count",
        "data" => [
            0 => [
                "case_id",
                "url"
            ]
        ]
    ];
}
