<?php

namespace App\Domains\Auth\Templates\Response;

class FetchUserAuthResponseTemplate
{
    public static array $remoteResponse = [
        'user' => [
            'id' => 1,
            'email' => '67@ya.ru',
            'username' => '67@ya.ru',
            'firstname' => '67',
            'lastname' => 'A',
            'patronymic' => '1',
            'fullname' => '67',
            'gender' => 'm',
            'phone' => '1',
            'avatar' => 'avatar.img',
            'country' => '7',
            'city' => 'SPb'
        ]
    ];

    public static array $outgoingResponse = [

    ];

    public static array $structureResponse = [

    ];
}
