<?php

namespace App\Domains\Comments\Templates\Response;

class SetThreadCommentsResponseTemplate
{
    public static array $remoteResponse = [
        "thread_id" => 3904,
        "user_id" => 10000,
        "created_at" => "2022-01-24T21:01:19.000000Z",
        "updated_at" => "2022-01-31T11:06:11.000000Z",
    ];

    public static array $outgoingResponse = [
        'data' => [
            "thread_id" => 3904,
            "user_id" => 10000,
            "created_at" => "2022-01-24T21:01:19.000000Z",
            "updated_at" => "2022-01-31T11:06:11.000000Z",
        ],
    ];

    public static array $structureResponse = [
        'data' => [
            "thread_id",
            "user_id",
            "created_at",
            "updated_at",
        ],
    ];
}
