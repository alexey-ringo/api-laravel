<?php

namespace App\Domains\Pay\Templates\Response;

class HistoryGiftCardsPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => [
            0 => [
                "id" => 408,
                "sum" => "50",
                "code" => "FRLC6DFXGETRHV",
                "type" => "in",
                "created" => 1637578001
            ],
            [
                "id" => 389,
                "sum" => "50",
                "code" => "FROOST5CWNMAX3",
                "type" => "in",
                "created" => 1635245434
            ]
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            0 => [
                "id" => 408,
                "sum" => "50",
                "code" => "FRLC6DFXGETRHV",
                "type" => "in",
                "created" => 1637578001
            ],
            [
                "id" => 389,
                "sum" => "50",
                "code" => "FROOST5CWNMAX3",
                "type" => "in",
                "created" => 1635245434
            ]
        ]
    ];

    public static array $structureResponse = [
        "data" => [
            [
                "id",
                "sum",
                "code",
                "type",
                "created"
            ],
        ]
    ];
}
