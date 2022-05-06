<?php

namespace App\Domains\Pay\Templates\Response;

class CloudPaymentDonationPayResponseTemplate
{
    public static array $remoteResponse = [
        'status' => 'Success',
        'message' => 'New transaction 1234',
//        'data' => [
//            "id" => 19223970,
//            "case_name" => "Такие дела",
//            "case_url" => "https://nuzhnapomosh.ru/funds/takie-dela",
//            "case_id" => 2,
//            "date" => "22.12.21",
//            "status" => "success",
//            "status_title" => "Получен",
//            "sum" => "77.00",
//            "sum_int" => 77,
//            "payment_type" => "Банковская карта",
//            "payment_title" => "Ежемесячное",
//            "is_reccurent" => true,
//            "is_paid" => true,
//            "payments_type" => "NP",
//            "commission" => [
//                "procent" => 0,
//                "sum" => "0",
//                "full_sum" => "77"
//            ],
//            "currency" => [
//                "symbol" => "₽",
//                "text" => "RUB"
//            ],
//            "payment" => [
//                [
//                    "type" => "Банковская карта",
//                    "num" => "Банковская карта",
//                    "sum" => "77.00",
//                    "sum_int" => "77.00"
//                ]
//            ],
//            "foreign" => false,
//            "foreign_type" => false
//        ]
    ];

    public static array $remoteResponseFail = [
        'status' => 'Failure',
        'message' => 'error cause',
        'code' => 3
    ];

    public static array $outgoingResponse = [
        'status' => 'Success',
        'message' => 'New transaction 1234',
//        'data' => [
//            "id" => 19223970,
//            "case_name" => "Такие дела",
//            "case_url" => "https://nuzhnapomosh.ru/funds/takie-dela",
//            "case_id" => 2,
//            "date" => "22.12.21",
//            "status" => "success",
//            "status_title" => "Получен",
//            "sum" => "77.00",
//            "currency" => [
//                "symbol" => "₽",
//                "text" => "RUB"
//            ],
//            "sum_int" => 77,
//            "payment_type" => "Банковская карта",
//            "payment_title" => "Ежемесячное",
//            "is_recurrent" => true,
//            "is_paid" => true,
//            "payments_type" => "NP",
//            "commission" => [
//                "percent" => 0,
//                "sum" => "0",
//                "full_sum" => "77"
//            ],
//            "payment" => [
//                [
//                    "type" => "Банковская карта",
//                    "num" => "Банковская карта",
//                    "sum" => "77.00",
//                    "sum_int" => "77.00"
//                ]
//            ],
//            "foreign" => false,
//            "foreign_type" => false
//        ]
    ];

    public static array $outgoingResponseFail = [
        'status' => 'Failure',
        'message' => 'error cause',
        'code' => 3,
//        'data' => []
    ];

    public static array $structureResponse = [
        'status',
        'message',
//        'data'
    ];

    public static array $structureResponseFail = [
        'status',
        'message',
        'code',
//        'data'
    ];
}
