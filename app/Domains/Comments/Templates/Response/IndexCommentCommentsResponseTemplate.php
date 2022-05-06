<?php

namespace App\Domains\Comments\Templates\Response;

class IndexCommentCommentsResponseTemplate
{
    public static array $remoteResponse = [
        0 => [
            "id" => 122705,
            "body" => "updated",
            "status" => 1,
            "hidden_sum" => false,
            "donation" => 500,
            "email" => "email@mail.ru",
            "phone" => "+79001234567",
            "utm_source" => "some_source",
            "utm_medium" => "some_companing",
            "utm_campaign" => "some_companing",
            "utm_referer" => "some_refer",
            "user_name" => "user name",
            "user_img" => "user img",
            "parent_id" => null,
            "thread_id" => 3904,
            "created_at" => "2022-01-24T21:01:19.000000Z",
            "updated_at" => "2022-01-28T14:29:47.000000Z"
        ],
        1 => [
            "id" => 122706,
            "body" => "some text_2",
            "status" => 1,
            "hidden_sum" => false,
            "donation" => 500,
            "email" => "email@mail.ru",
            "phone" => "+79001234567",
            "utm_source" => "some_source",
            "utm_medium" => "some_companing",
            "utm_campaign" => "some_companing",
            "utm_referer" => "some_refer",
            "user_name" => "user name",
            "user_img" => "user img",
            "parent_id" => null,
            "thread_id" => 3904,
            "created_at" => "2022-01-24T22:56:39.000000Z",
            "updated_at" => "2022-01-24T22:56:39.000000Z"
        ],
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
                "id" => 122705,
                "body" => "updated",
                "status" => 1,
                "hidden_sum" => false,
                "donation" => 500,
                "email" => "email@mail.ru",
                "phone" => "+79001234567",
                "utm_source" => "some_source",
                "utm_medium" => "some_companing",
                "utm_campaign" => "some_companing",
                "utm_referer" => "some_refer",
                "user_name" => "user name",
                "user_img" => "user img",
                "parent_id" => null,
                "thread_id" => 3904,
                "created_at" => "2022-01-24T21:01:19.000000Z",
                "updated_at" => "2022-01-28T14:29:47.000000Z"
            ],
            1 => [
                "id" => 122706,
                "body" => "some text_2",
                "status" => 1,
                "hidden_sum" => false,
                "donation" => 500,
                "email" => "email@mail.ru",
                "phone" => "+79001234567",
                "utm_source" => "some_source",
                "utm_medium" => "some_companing",
                "utm_campaign" => "some_companing",
                "utm_referer" => "some_refer",
                "user_name" => "user name",
                "user_img" => "user img",
                "parent_id" => null,
                "thread_id" => 3904,
                "created_at" => "2022-01-24T22:56:39.000000Z",
                "updated_at" => "2022-01-24T22:56:39.000000Z"
            ],
        ],
    ];

    public static array $structureResponse = [
        'data' => [
            [
                "id",
                "body",
                "status",
                "hidden_sum",
                "donation",
                "email",
                "phone",
                "utm_source",
                "utm_medium",
                "utm_campaign",
                "utm_referer",
                "user_name",
                "user_img",
                "parent_id",
                "thread_id",
                "created_at",
                "updated_at"
            ]
        ],
    ];
}
