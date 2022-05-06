<?php

namespace App\Domains\Crm\Templates\Response;

class AttachCounterpartyCrmResponseTemplate
{
    public static array $remoteResponse = [
        "id" => 7,
        "provider" => [
            "id" => 14957,
            "namespace" => "Planfix\\PlanfixProvider"
        ],
        "counterparty" => [
            "id" => "D1E094BE-0746-4078-A3A8-CD304078B00F",
            "model_type" => "user",
            "model_id" => 200567,
            "created_at" => "2021-09-01T14:00:01.000000Z",
            "updated_at" => "2021-09-01T14:00:01.000000Z"
        ],
        "data" => [
            "inn" => "123456789765",
            "phone" => "79996660000",
            "email" => "p.prokofyev_dev@nuzhnapomosh.ru",
            "company" => "АНО \"Портал \"Такие дела\"",
            "lastname" => "Прокофьев",
            "firstname" => "ПавелТест",
            "middlename" => "Сергеевич"
        ],
        "created_at" => "2022-02-04T06:41:35.000000Z"
    ];

    public static array $outgoingResponse = [
        "data" => [
            "id" => 7,
            "provider" => [
                "id" => 14957,
                "namespace" => "Planfix\\PlanfixProvider"
            ],
            "counterparty" => [
                "id" => "D1E094BE-0746-4078-A3A8-CD304078B00F",
                "model_type" => "user",
                "model_id" => 200567,
                "created_at" => "2021-09-01T14:00:01.000000Z",
                "updated_at" => "2021-09-01T14:00:01.000000Z"
            ],
            "data" => [
                "inn" => "123456789765",
                "phone" => "79996660000",
                "email" => "p.prokofyev_dev@nuzhnapomosh.ru",
                "company" => "АНО \"Портал \"Такие дела\"",
                "lastname" => "Прокофьев",
                "firstname" => "ПавелТест",
                "middlename" => "Сергеевич"
            ],
            "created_at" => "2022-02-04T06:41:35.000000Z"
        ],
    ];

    public static array $structureResponse = [
        'data' => [
        ]
    ];
}
