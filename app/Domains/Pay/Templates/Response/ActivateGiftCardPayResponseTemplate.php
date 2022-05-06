<?php

namespace App\Domains\Pay\Templates\Response;

class ActivateGiftCardPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => "Gift Cart was created",
        "data" => [
                "id" => 408,
                "sum" => "50",
                "code" => "FRLC6DFXGETRHV",
                "type" => "in",
                "created" => 1637578001
            ]
    ];

    public static array $remoteResponseFail = [
        "status" => "Failure",
        "message" => "Error"
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "message" => "Gift Cart was created",
        "data" => [
            "id" => 408,
            "sum" => "50",
            "code" => "FRLC6DFXGETRHV",
            "type" => "in",
            "created" => 1637578001
        ]
    ];

    public static array $outgoingResponseFail = [
        "status" => "Failure",
        "message" => "Error"
    ];

    public static array $structureResponse = [
        "status",
        "message",
        "data"
    ];
}
