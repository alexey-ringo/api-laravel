<?php

namespace App\Domains\Auth\Templates\Response;

class ListUsersByIdsAuthResponseTemplate
{
    public static array $remoteResponse = [
        "status" => true,
        "message" => "Success",
        "data" => [
            "1" => [
                "id" => 1,
                "firstname" => "67",
                "lastname" => null,
                "email" => "67@ya.ru",
                "avatar" => "avatar1",
                "fullname" => "67",
                "lk" => "23b36d46c3806db7f6e76b7c266bfbec11a7e4c6"
            ],
            "266552" => [
                "id" => 266552,
                "firstname" => "Superats",
                "lastname" => null,
                "email" => "superats@yandex.ru",
                "avatar" => "avatar2",
                "fullname" => "Superats",
                "lk" => "669d35f4da058a5b19c5acb5030b8389d0d3e9b8"
            ]
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            "1" => [
                "id" => 1,
                "firstname" => "67",
                "lastname" => null,
                "email" => "67@ya.ru",
                "avatar" => "avatar1",
                "fullname" => "67",
                "lk" => "23b36d46c3806db7f6e76b7c266bfbec11a7e4c6"
            ],
            "266552" => [
                "id" => 266552,
                "firstname" => "Superats",
                "lastname" => null,
                "email" => "superats@yandex.ru",
                "avatar" => "avatar2",
                "fullname" => "Superats",
                "lk" => "669d35f4da058a5b19c5acb5030b8389d0d3e9b8"
            ]
        ]
    ];

    public static array $structureResponse = [

    ];
}
