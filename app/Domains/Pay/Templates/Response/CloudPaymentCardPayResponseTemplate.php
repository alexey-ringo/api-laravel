<?php

namespace App\Domains\Pay\Templates\Response;

class CloudPaymentCardPayResponseTemplate
{
    public static array $remoteResponseCreate = [
        'status' => 'Success',
        'message' => 'New transaction 1234',
        'data' => [
            "id" => 48988,
            "cardnumber" => "426101****9039",
            "cardtype" => "Visa",
            "is_maincard" => true,
            "finish_m" => 9,
            "finish_y" => 22,
            "provider" => "cp",
            "status" => "delete"
        ]
    ];

    public static array $outgoingResponseCreate = [
        'status' => 'Success',
        'message' => 'New transaction 1234',
        'data' => [
            "id" => 48988,
            "cardnumber" => "426101****9039",
            "cardtype" => "Visa",
            "is_maincard" => true,
            "finish_m" => 9,
            "finish_y" => 22,
            "provider" => "cp",
            "status" => "delete"
        ]
    ];

    public static array $remoteResponseOther = [
        'status' => 'Success',
        'message' => 'New transaction 1234',
    ];

    public static array $outgoingResponseOther = [
        'status' => 'Success',
        'message' => 'New transaction 1234',
    ];

    public static array $structureResponseCreate = [
        'status',
        'message',
        'data'
    ];

    public static array $structureResponseOther = [
        'status',
        'message',
    ];
}
