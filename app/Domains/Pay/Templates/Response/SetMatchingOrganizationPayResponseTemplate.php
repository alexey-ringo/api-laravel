<?php

namespace App\Domains\Pay\Templates\Response;

class SetMatchingOrganizationPayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "message" => "Вы успешно обновили данные об организации, они отправлены на модерацию"
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "message" => "Вы успешно обновили данные об организации, они отправлены на модерацию",
        "data" => [
        ]
    ];

    public static array $structureResponse = [
        "status",
        "message",
        "data" => [
        ]
    ];
}
