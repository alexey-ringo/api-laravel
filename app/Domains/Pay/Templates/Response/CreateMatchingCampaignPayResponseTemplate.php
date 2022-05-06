<?php

namespace App\Domains\Pay\Templates\Response;

class CreateMatchingCampaignPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => "Кампания создана",
        "data" => [
            "id" => 43,
            "name" => "Test Campaign 3 limited period",
            "start" => "07.11.2021",
            "stop" => "07.12.2021",
            "max_sum" => "0",
            "target_sum" => "0",
            "left_sum" => null,
            "progress" => "0",
            "count_donation" => "0",
            "average_donation" => 0,
            "metrics" => [],
            "metrics_count" => 0,
            "once_donations" => [
                "count" => "0",
                "sum" => "0",
                "users" => "0"
            ],
            "signup_donations" => [
                "count" => "0",
                "sum" => "0"
            ],
            "active_signups" => [
                "count" => "0",
                "sum" => "0",
                "users" => "0"
            ],
            "open_events" => 34,
            "details_funds" => [],
            "all_cases" => [
                2,
                91,
                97,
                103
            ],
            "counts" => [
                "funds" => 2,
                "cases" => 2
            ],
            "status" => "Черновик",
            "status_class" => "draft"
        ]
    ];

    public static array $remoteResponseFail = [
        'status' => 'Failure',
        'message' => 'error',
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "message" => "Кампания создана",
        "data" => [
            "id" => 43,
            "name" => "Test Campaign 3 limited period",
            "start" => "07.11.2021",
            "stop" => "07.12.2021",
            "max_sum" => "0",
            "target_sum" => "0",
            "left_sum" => null,
            "progress" => "0",
            "count_donation" => "0",
            "average_donation" => 0,
            "metrics" => [],
            "metrics_count" => 0,
            "once_donations" => [
                "count" => "0",
                "sum" => "0",
                "users" => "0"
            ],
            "signup_donations" => [
                "count" => "0",
                "sum" => "0"
            ],
            "active_signups" => [
                "count" => "0",
                "sum" => "0",
                "users" => "0"
            ],
            "open_events" => 34,
            "details_funds" => [],
            "all_cases" => [
                2,
                91,
                97,
                103
            ],
            "counts" => [
                "funds" => 2,
                "cases" => 2
            ],
            "status" => "Черновик",
            "status_class" => "draft"
        ]
    ];

    public static array $outgoingResponseFail = [
        'status' => 'Failure',
        'message' => 'error',
    ];

    public static array $structureResponse = [
        "status",
        "message",
        "data" => [
            "id",
            "name",
            "start",
            "stop",
            "max_sum",
            "target_sum",
            "left_sum",
            "progress",
            "count_donation",
            "average_donation",
            "metrics",
            "metrics_count",
            "once_donations" => [
                "count",
                "sum",
                "users"
            ],
            "signup_donations" => [
                "count",
                "sum"
            ],
            "active_signups" => [
                "count",
                "sum",
                "users"
            ],
            "open_events",
            "details_funds",
            "all_cases",
            "counts" => [
                "funds",
                "cases"
            ],
            "status",
            "status_class"
        ]
    ];
}
