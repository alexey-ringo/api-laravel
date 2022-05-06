<?php

namespace App\Domains\Pay\Templates\Response;

class UserMetricsMatchingPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => [
            "matching_balance" => '20',
            "active_campaigns" => '30',
            "donations_count" => '50'
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            "matching_balance" => '20',
            "active_campaigns" => '30',
            "donations_count" => '50'
        ]
    ];

    public static array $structureResponse = [
        "data" => [
            "matching_balance",
            "active_campaigns",
            "donations_count"
        ]
    ];
}
