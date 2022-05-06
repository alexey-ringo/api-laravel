<?php

namespace App\Domains\Crm\Templates\Response;

class StoreVirtualAccountCrmResponseTemplate
{
    public static array $remoteResponse = [
        'data' => [
            'id' => 'C580E537-2667-4D3A-AC14-34F448B22039',
            'type' => [
                'id' => 2,
                'name' => 'Пожертвования от физических лиц'
            ],
            'subtype' => [
                'id' => 3,
                'name' => 'Пожертвования от физических лиц'
            ],
            'case' => [
                'id' => 103,
                'name' => 'АдВита',
                'created_at' => '2021-03-02 11:18:54',
                'closed_at' => null
            ],
            'fund' => [
                'id' => 1,
                'name' => 'АдВита',
                'url' => 'http://www.advita.ru/',
                'full_name' => 'НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ БЛАГОТВОРИТЕЛЬНЫЙ ФОНД АДВИТА'
            ],
            'created_at' => '2021-07-28T09:31:29.000000Z',
            'updated_at' => '2021-07-28T09:31:29.000000Z',
        ]
    ];

    public static array $structureResponse = [
        'data' => [
            'id',
            'name',
            'type' => [
                'id',
                'name'
            ],
            'case' => [
                'id',
                'name',
                'created_at',
                'closed_at'
            ],
            'fund' => [
                'id',
                'name',
                'url',
                'full_name'
            ],
            'created_at',
            'updated_at',
        ]
    ];
}
