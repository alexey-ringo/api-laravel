<?php

namespace App\Domains\Pay\Templates\Response;

class YookassaPayResponseTemplate
{
    public static array $remoteResponse = [
        'status' => 'Success',
        'message' => 'https://yoomoney.ru/payments/external/confirmation?orderId=28493ffa-000f-5000-9000-1076eac9b7a7',
        'data' => [
            'tmp' => 'example'
        ]
    ];

    public static array $remoteResponseFail = [
        'status' => 'Failure',
        'message' => 'Empty action',
        'data' => []
    ];

    public static array $structureResponse = [
        "status",
        "message",
        "data"
    ];
}
