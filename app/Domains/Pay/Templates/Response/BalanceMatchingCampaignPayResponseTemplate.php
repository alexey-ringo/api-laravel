<?php

namespace App\Domains\Pay\Templates\Response;

class BalanceMatchingCampaignPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "result" => 105.3
    ];

    public static array $remoteResponseFail = [
        "status" => "Failure",
        "message" => "Error"
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "result" => 105.3
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
