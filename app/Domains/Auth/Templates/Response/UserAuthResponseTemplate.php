<?php

namespace App\Domains\Auth\Templates\Response;

class UserAuthResponseTemplate
{
    public static array $remoteResponse = [
        'status' => true,
        'data' => [
            'id' => 1,
            'email' => '67@ya.ru',
            'firstname' => '67',
            'lastname' => 'A',
            'patronymic' => '1',
            'fullname' => '67',
            'gender' => 'm',
            'phone' => '1',
            'avatar' => 'avatar.img',
            'country' => '7',
            'city' => 'SPb',
            'email_verified' => true,
            'phone_verified' => true,
            'social_identifiers' => [
                0 => [
                    'id' => 3,
                    'provider' => 'telegram',
                    'social_id' => '1234568'
                ],
                1 => [
                    'id' => 6,
                    'provider' => 'tik-tok',
                    'social_id' => '1234568'
                ]
            ]
        ],
        'message' => 'message'
    ];

    public static array $outgoingResponse = [
        'status' => true,
        'data' => [
            'id' => 1,
            'email' => '67@ya.ru',
            'firstname' => '67',
            'lastname' => 'A',
            'patronymic' => '1',
            'fullname' => '67',
            'gender' => 'm',
            'phone' => '1',
            'avatar' => 'avatar.img',
            'country' => '7',
            'city' => 'SPb',
            'email_verified' => true,
            'phone_verified' => true,
            'social_identifiers' => [
                0 => [
                    'id' => 3,
                    'provider' => 'telegram',
                    'social_id' => '1234568'
                ],
                1 => [
                    'id' => 6,
                    'provider' => 'tik-tok',
                    'social_id' => '1234568'
                ]
            ]
        ],
        'message' => 'message'
    ];

    public static array $structureResponse = [
        'status',
        'data' => [
            'id',
            'email',
            'firstname',
            'lastname',
            'patronymic',
            'fullname',
            'gender',
            'phone',
            'country',
            'city',
            'email_verified',
            'phone_verified',
            'social_identifiers' => [
                [
                    'id',
                    'provider',
                    'social_id'
                ],
            ],
            'message'
        ]
    ];
}
