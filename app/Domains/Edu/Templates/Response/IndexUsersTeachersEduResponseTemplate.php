<?php

namespace App\Domains\Edu\Templates\Response;

class IndexUsersTeachersEduResponseTemplate
{
    public static array $remoteResponse = [
        "status" => true,
        "data" => [
            "total" => 42,
            "users" => [
                0 => [
                    "user_id" => 14227,
                    "global_user_id" => null,
                    "email" => "babayan@unhcr.org",
                    "name" => "Арарат Бабаян",
                    "registered" => "2020-12-16 05:00:13",
                    "avatar" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/2.png",
                    "url" => "https://edu.nuzhnapomosh.ru/author/a-babayan/"
                ],
            ],
        ]
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
                "user_id" => 14227,
                "global_user_id" => null,
                "email" => "babayan@unhcr.org",
                "name" => "Арарат Бабаян",
                "registered" => "2020-12-16 05:00:13",
                "avatar" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/2.png",
                "url" => "https://edu.nuzhnapomosh.ru/author/a-babayan/"
            ],
        ],
        "total" => 42
    ];

    public static array $structureResponse = [
        'data' => [
            [
                "user_id",
                "global_user_id",
                "email",
                "name",
                "registered",
                "avatar",
                "url"
            ],
            "total"
        ],
    ];
}
