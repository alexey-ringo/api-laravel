<?php

namespace App\Domains\Crm\Templates\Response;

class UpdateSubscriptionUpgradeCounterpartyCrmResponseTemplate
{
    public static array $remoteResponse = [
        "data" => [
            "uuid" => "1FB55105-C8DA-4C4D-ADB4-AEED83E32CA0",
            "state" => "UPDATED",
            "counterparty" => [
                "id" => "0566B1EA-174C-441B-B4ED-C3475A9C66A3"
            ],
            "builder" => [
                "id" => 1,
                "state" => "SENT"
            ],
            "views" => 1,
            "expired" => false
        ]
    ];

    public static array $outgoingResponse = [
        "uuid" => "1FB55105-C8DA-4C4D-ADB4-AEED83E32CA0",
        "state" => "UPDATED",
        "counterparty" => [
            "id" => "0566B1EA-174C-441B-B4ED-C3475A9C66A3"
        ],
        "builder" => [
            "id" => 1,
            "state" => "SENT"
        ],
        "views" => 1,
        "expired" => false
    ];

    public static array $structureResponse = [
        "uuid",
        "state",
        "counterparty" => [
            "id"
        ],
        "builder" => [
            "id",
            "state"
        ],
        "views",
        "expired"
    ];
}
