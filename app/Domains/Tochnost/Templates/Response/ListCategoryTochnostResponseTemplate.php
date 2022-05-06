<?php

namespace App\Domains\Tochnost\Templates\Response;

class ListCategoryTochnostResponseTemplate
{
    public static array $remoteResponse = [
        0 => [
            "id" => 24064,
            "order" => 0,
            "name" => 'name',
            "slug" => 'slug',
            "parent_id" => null,
            "name_d" => 'name_d',
            "children" => [
                0 => [
                    "id" => 24964,
                    "order" => 0,
                    "name" => 'name',
                    "slug" => 'slug',
                    "parent_id" => 24064,
                    "name_d" => 'name_d'
                ]
            ],
        ],
        1 => [
            "id" => 24065,
            "order" => 0,
            "name" => 'name2',
            "slug" => 'slug2',
            "parent_id" => null,
            "name_d" => 'name_d',
            "children" => [],
        ],
    ];

    public static array $fakeResponse = [];

    public static array $structureResponse = [
        "data" => [
            0 => [
                "id",
                "order",
                "name",
                "slug",
                "parent_id",
                "name_d",
                "children" => [
                    0 => [
                        "id",
                        "order",
                        "name",
                        "slug",
                        "parent_id",
                        "name_d"
                    ]
                ],
            ],
            1 => [
                "id",
                "order",
                "name",
                "slug",
                "parent_id",
                "name_d",
                "children",
            ],
        ],
    ];
}
