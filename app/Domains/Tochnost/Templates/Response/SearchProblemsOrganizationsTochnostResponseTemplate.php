<?php

namespace App\Domains\Tochnost\Templates\Response;

class SearchProblemsOrganizationsTochnostResponseTemplate
{
    public static array $remoteResponse = [
        'data' => [
            0 => [
                "inn" => "7709669884",
                "ogrn" => "1067746461617",
                "kpp" => "770901001",
                "full_name" => "БЛАГОТВОРИТЕЛЬНЫЙ ФОНД \"МИЛОСЕРДИЕ\"",
                "logo" => null,
                "problems" => [],
            ],
            1 => [
                "inn" => "7709669885",
                "ogrn" => "1067746461618",
                "kpp" => "770901001",
                "full_name" => "БЛАГОТВОРИТЕЛЬНЫЙ ФОНД \"МИЛОСЕРДИЕ\"",
                "logo" => "logo",
                "problems" => [],
            ],
        ],
        'total' => 2
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
                "inn" => "7709669884",
                "ogrn" => "1067746461617",
                "kpp" => "770901001",
                "full_name" => "БЛАГОТВОРИТЕЛЬНЫЙ ФОНД \"МИЛОСЕРДИЕ\"",
                "logo" => null,
                "problems" => [],
            ],
            1 => [
                "inn" => "7709669885",
                "ogrn" => "1067746461618",
                "kpp" => "770901001",
                "full_name" => "БЛАГОТВОРИТЕЛЬНЫЙ ФОНД \"МИЛОСЕРДИЕ\"",
                "logo" => "logo",
                "problems" => [],
            ],
        ],
        'total' => 2
    ];

    public static array $structureResponse = [
        'data' => [

        ],
    ];
}
