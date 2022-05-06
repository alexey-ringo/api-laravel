<?php

namespace App\Domains\Pay\Templates\Response;

class InvoicePayResponseTemplate
{
    public static array $remoteResponse = [
        "status" => "Success",
        "data" => [
            "id" => 18931209,
            "uid" => "d_18931209",
            "case_name" => "Такие дела",
            "full_sum" => "55.00",
            "real_sum" => "55.00",
            "currency" => "RUB",
            "date_timestamp" => "24.11.2021",
            "recurrent" => "Разовый платеж",
            "provider" => "CP",
            "type" => "Банковская карта",
            "user" => "Алексей2 Ринго"
        ]
    ];

    public static array $outgoingResponse = [
        "status" => "Success",
        "data" => [
            "id" => 18931209,
            "uid" => "d_18931209",
            "case_name" => "Такие дела",
            "full_sum" => "55.00",
            "real_sum" => "55.00",
            "currency" => "RUB",
            "date_timestamp" => "24.11.2021",
            "recurrent" => "Разовый платеж",
            "provider" => "CP",
            "type" => "Банковская карта",
            "user" => "Алексей2 Ринго"
        ]
    ];

    public static array $structureResponse = [
        "status",
        "data" => [
            "id",
            "uid",
            "case_name",
            "full_sum",
            "real_sum",
            "currency",
            "date_timestamp",
            "recurrent",
            "provider",
            "type",
            "user"
        ]
    ];
}
