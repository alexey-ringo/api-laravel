<?php

namespace App\Domains\Tochnost\Templates\Response;

class CountOrganizationsTochnostResponseTemplate
{
    public static array $remoteResponse = [
        "data" => [
            'verify' => 312,
            'active' => 16270
        ]
    ];

    public static array $fakeResponse = [];

    public static array $structureResponse = [
        "data" => [
            'verify',
            'active'
        ]
    ];
}
