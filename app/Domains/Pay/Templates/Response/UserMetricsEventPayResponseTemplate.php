<?php

namespace App\Domains\Pay\Templates\Response;

class UserMetricsEventPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => [
            "events_count" => 20,
            "actions_count" => 30,
            "total_sum" => '50'
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            "events_count" => 20,
            "actions_count" => 30,
            "total_sum" => '50'
        ]
    ];

    public static array $structureResponse = [
        "data" => [
            "events_count",
            "actions_count",
            "total_sum"
        ]
    ];
}
