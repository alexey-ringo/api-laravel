<?php

namespace App\Domains\Crm\Templates\Response;

class StoreCounterpartyCrmResponseTemplate
{
    public static array $remoteResponse = [
        'data' => [
            'id' => '366C9EE9-4643-437C-A0D2-ADE86A994B3A',
            'model_type' => 'user',
            'model_id' => 123,
            'created_at' => '2021-07-28T09:31:29.000000Z',
            'updated_at' => '2021-07-28T09:31:29.000000Z',
        ]
    ];

    public static array $outgoingResponse = [
        'data' => [
            'id' => '366C9EE9-4643-437C-A0D2-ADE86A994B3A',
            'model_type' => 'user',
            'model_id' => 123,
            'created_at' => '2021-07-28T09:31:29.000000Z',
            'updated_at' => '2021-07-28T09:31:29.000000Z',
        ]
    ];

    public static array $structureResponse = [
        'data' => [
            'id',
            'model_type',
            'model_id',
            'created_at',
            'updated_at',
        ]
    ];
}
