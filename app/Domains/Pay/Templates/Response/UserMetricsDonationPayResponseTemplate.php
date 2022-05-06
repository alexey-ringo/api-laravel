<?php

namespace App\Domains\Pay\Templates\Response;

class UserMetricsDonationPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => [
            "count_project" => 20,
            "count_donation" => 30,
            "sum" => '50'
        ]
    ];

    public static array $outgoingResponse = [
        "data" => [
            "count_project" => 20,
            "count_donation" => 30,
            "sum" => '50'
        ]
    ];

    public static array $structureResponse = [
        "data" => [
            "count_project",
            "count_donation",
            "sum"
        ]
    ];
}
