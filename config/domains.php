<?php declare(strict_types = 1);

return [
    'takiedela' => [
        'production' => [
            'base_uri' => env('DOMAINS_TAKIEDELA_PROD_BASEURI', 'https://takiedela.ru/wp-json/api/v1'),
            'token' => env('DOMAINS_TAKIEDELA_PROD_TOKEN', '123456789'),
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_TAKIEDELA_STAGING_BASEURI', 'https://pre.takiedela.ru/wp-json/api/v1'),
            'token' => env('DOMAINS_TAKIEDELA_STAGING_TOKEN', '123456789'),
        ],
    ],
    'shop' => [
        'production' => [
            'base_uri' => env('DOMAINS_SHOP_PROD_BASEURI', 'https://shop.takiedela.ru'),
            'token' => env('DOMAINS_SHOP_PROD_TOKEN', '123456789'),
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_SHOP_STAGING_BASEURI', 'https://shop.takiedela.ru'),
            'token' => env('DOMAINS_SHOP_STAGING_TOKEN', '123456789'),
        ],
    ],
    'auth' => [
        'production' => [
            'base_uri' => env('DOMAINS_AUTH_PROD_BASEURI', 'https://auth.nuzhnapomosh.ru'),
            'base_auth_username' => env('DOMAINS_AUTH_PROD_BASEAUTH_USERNAME', 'login'),
            'base_auth_password' => env('DOMAINS_AUTH_PROD_BASEAUTH_PASSWORD', 'password'),
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_AUTH_STAGING_BASEURI', 'https://staging-auth.nuzhnapomosh.ru'),
            'base_auth_username' => env('DOMAINS_AUTH_STAGING_BASEAUTH_USERNAME', 'login'),
            'base_auth_password' => env('DOMAINS_AUTH_STAGING_BASEAUTH_PASSWORD', 'password'),
        ],
        'local' => [
            'base_uri' => env('DOMAINS_AUTH_LOCAL_BASEURI', 'https://auth.npmsh.local'),
            'base_auth_username' => env('DOMAINS_AUTH_LOCAL_BASEAUTH_USERNAME', 'login'),
            'base_auth_password' => env('DOMAINS_AUTH_LOCAL_BASEAUTH_PASSWORD', 'password'),
        ],
    ],
    'tochnost' => [
        'production' => [
            'base_uri' => env('DOMAINS_TOCHNOST_PROD_BASEURI', 'https://nko.tochno.st/api'),
            'token' => env('DOMAINS_TOCHNOST_PROD_TOKEN', ''),
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_TOCHNOST_STAGING_BASEURI', 'https://dev.nko.tochno.st/api'),
            'token' => env('DOMAINS_TOCHNOST_STAGING_TOKEN', ''),
        ],
    ],
    'pay' => [
        'production' => [
            'base_uri' => env('DOMAINS_PAY_PROD_BASEURI', 'https://pay.nuzhnapomosh.ru/v1'),
            'base_auth_username' => env('DOMAINS_PAY_PROD_BASEAUTH_USERNAME', 'user'),
            'base_auth_password' => env('DOMAINS_PAY_PROD_BASEAUTH_PASSWORD', 'pass'),
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_PAY_STAGING_BASEURI', 'https://pay.nuzhnapomosh.ru/v1'),
            'base_auth_username' => env('DOMAINS_PAY_STAGING_BASEAUTH_USERNAME', 'user'),
            'base_auth_password' => env('DOMAINS_PAY_STAGING_BASEAUTH_PASSWORD', 'pass'),
        ],
    ],
    'sluchaem' => [
        'production' => [
            'base_uri' => env('DOMAINS_SLUCHAEM_PROD_BASEURI', 'https://sluchaem.ru/api/v1'),
            'base_auth_username' => env('DOMAINS_SLUCHAEM_PROD_BASEAUTH_USERNAME', 'user'),
            'base_auth_password' => env('DOMAINS_SLUCHAEM_PROD_BASEAUTH_PASSWORD', 'pass'),
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_SLUCHAEM_STAGING_BASEURI', 'https://my.sharity.ru/api/v1'),
            'base_auth_username' => env('DOMAINS_SLUCHAEM_STAGING_BASEAUTH_USERNAME', 'user'),
            'base_auth_password' => env('DOMAINS_SLUCHAEM_STAGING_BASEAUTH_PASSWORD', 'pass'),
        ],
    ],
    'ps' => [
        'production' => [
            'base_uri' => env('DOMAINS_PS_PROD_BASEURI', 'https://ps.nuzhnapomosh.ru/api')
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_PS_STAGING_BASEURI', 'https://staging-ps.nuzhnapomosh.ru/api')
        ],
    ],
    'crm' => [
        'production' => [
            'base_uri' => env('DOMAINS_CRM_PROD_BASEURI', 'https://crm.nuzhnapomosh.ru/api')
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_CRM_STAGING_BASEURI', 'https://dev-crm.nuzhnapomosh.ru/api')
        ],
    ],
    'edu' => [
        'production' => [
            'base_uri' => env('DOMAINS_EDU_PROD_BASEURI', 'https://edu.nuzhnapomosh.ru/wp-json')
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_EDU_STAGING_BASEURI', 'https://edu.nuzhnapomosh.ru/wp-json')
        ],
    ],
    'comments' => [
        'production' => [
            'base_uri' => env('DOMAINS_COMMENTS_PROD_BASEURI', 'https://comments.nuzhnapomosh.ru/api')
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_COMMENTS_STAGING_BASEURI', 'https://staging-comments.nuzhnapomosh.ru/api')
        ],
    ],
    'core' => [
        'production' => [
            'base_uri' => env('DOMAINS_CORE_PROD_BASEURI', 'https://backend.core.nuzhnapomosh.ru'),
            'bearer_token' => env('DOMAINS_CORE_PROD_BEARER_TOKEN', ''),
        ],
        'staging' => [
            'base_uri' => env('DOMAINS_CORE_STAGING_BASEURI', 'https://dev.backend.core.nuzhnapomosh.ru'),
            'bearer_token' => env('DOMAINS_CORE_STAGING_BEARER_TOKEN', ''),
        ],
    ],
];
