<?php

namespace App\Domains\Auth\Templates\Response;

class LoginCodeTokenAuthResponseTemplate
{
    public static array $remoteResponse = [
        "status" => true,
        "message" => "Success",
        "data" => [
            "access_token" => "123qweasd",
            "refresh_token" => "321qweasd",
        ]
    ];

    public static array $outgoingResponse = [
        "status" => true,
        "message" => "Success",
        "data" => [
            "access_token" => "123qweasd",
            "refresh_token" => "321qweasd",
        ]
    ];

    public static array $structureResponse = [
        "status",
        "message",
        "data" => [
            "access_token",
            "refresh_token",
        ]
    ];
}
