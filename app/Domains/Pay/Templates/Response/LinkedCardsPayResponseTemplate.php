<?php

namespace App\Domains\Pay\Templates\Response;

class LinkedCardsPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => [
            0 => [
                "id" => 48988,
                "cardnumber" => "426101****9039",
                "cardtype" => "Visa",
                "is_maincard" => true,
                "finish_m" => 9,
                "finish_y" => 22,
                "provider" => "cp",
                "status" => "delete"
            ]
        ]
    ];

    public static array $remoteResponseFail = [
        "status" => "Failure",
        "message" => "Cards list empty"
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "data" => [
            0 => [
                "id" => 48988,
                "cardnumber" => "426101****9039",
                "cardtype" => "Visa",
                "is_maincard" => true,
                "finish_m" => 9,
                "finish_y" => 22,
                "provider" => "cp",
                "status" => "delete"
            ]
        ]
    ];
    public static array $outgoingResponseFail = [
        "status" => "Failure",
        "message" => "Cards list empty"
    ];

    public static array $structureResponse = [
        'status',
        'data' => [
            [
                'id',
                'cardnumber'
            ]
        ]
    ];

    public static array $structureResponseFail = [
        "status",
        "message",
        "data",
    ];
}
