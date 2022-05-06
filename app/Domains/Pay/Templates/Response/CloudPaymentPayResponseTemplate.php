<?php

namespace App\Domains\Pay\Templates\Response;

class CloudPaymentPayResponseTemplate
{
    public static array $remoteResponseRedirect = [
        'status' => 'Failure',
        'message' => 'redirect',
        'PaReq' => 'https://ref',
        'MD' => 1234567,
        'TermUrl' => 'https://ref',
        'AcsUrl' => 'https://ref',
    ];

    public static array $remoteResponseFail = [
        'status' => 'Failure',
        'message' => 'error cause',
        'code' => 3
    ];

    public static array $outgoingResponseRedirect = [
        'status' => 'Failure',
        'message' => 'redirect',
        'PaReq' => 'https://ref',
        'MD' => 1234567,
        'TermUrl' => 'https://ref',
        'AcsUrl' => 'https://ref'
    ];

    public static array $outgoingResponseFail = [
        'status' => 'Failure',
        'message' => 'error cause',
        'code' => 3
    ];

    public static array $structureResponseRedirect = [
        'status',
        'message',
        'PaReq',
        'MD',
        'TermUrl',
        'AcsUrl'
    ];

    public static array $structureResponseFail = [
        'status',
        'message',
        'code'
    ];
}
