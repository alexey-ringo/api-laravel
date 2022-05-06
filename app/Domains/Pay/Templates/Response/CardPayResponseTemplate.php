<?php

namespace App\Domains\Pay\Templates\Response;

class CardPayResponseTemplate
{
    public static array $remoteResponse = [
        'status' => true,
        'message' => 'Карта успешно удалена',
        'data' => [
            'tmp' => 'example'
        ]
    ];

    public static array $outgoingResponse = [
        'status' => true,
        'message' => 'Карта успешно удалена',
        'data' => [
            'tmp' => 'example'
        ]
    ];

    public static array $structureResponse = [
        'status',
        'message',
        'data'
    ];
}
