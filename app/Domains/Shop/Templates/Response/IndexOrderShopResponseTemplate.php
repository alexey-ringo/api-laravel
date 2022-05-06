<?php

namespace App\Domains\Shop\Templates\Response;

class IndexOrderShopResponseTemplate
{
    public static array $remoteResponse = [
        "data" => [
            0 => [
                "data" => [
                    "order_id" => "2246",
                    "invoice_no" => "0",
                    "invoice_prefix" => "INV-2020-00",
                    "store_id" => "0",
                    "store_name" => "Такие дела",
                    "store_url" => "https://shop.takiedela.ru/",
                    "customer_id" => "23238",
                    "firstname" => "Даниил",
                    "lastname" => "Шевчук",
                    "email" => "d.shevchuk@nuzhnapomosh.ru",
                    "telephone" => "+7 913 892-63-42",
                    "custom_field" => [],
                    "shipping_address_1" => "обл. Новосибирская, г. Новосибирск, ул. Рассветная, ДОМ, 10",
                    "shipping_method" => "В пункт выдачи Сберпосылка",
                    "shipping_method_sum" => "264.0000",
                    "comment" => "",
                    "total" => "274.0000",
                    "order_status_id" => "9",
                    "order_status" => "Передано в 1С",
                    "affiliate_id" => "0",
                    "commission" => "0.0000",
                    "language_id" => "1",
                    "language_code" => "ru-ru",
                    "currency_id" => "1",
                    "currency_code" => "RUB",
                    "currency_value" => "1.00000000",
                    "ip" => "37.195.244.70",
                    "forwarded_ip" => "",
                    "user_agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36",
                    "accept_language" => "ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7",
                    "date_added" => "2021-04-28 12:54:27",
                    "date_modified" => "2021-08-18 16:30:23",
                ],
                "products" => [
                    0 => [
                        "order_product_id" => "3535",
                        "product_id" => "82",
                        "name" => "Тестовый товар",
                        "model" => "shoptestproduct998223242345",
                        "total" => "10.0000",
                        "quantity" => "1",
                        "image" => "https://shop.takiedela.ru/image/cache/catalog/TSHIRT_Tragicheskiy_content/tkontent2-120x120.jpg",
                        "author" => null,
                        "size" => "",
                        "download" => "",
                        "option" => [],
                    ]
                ]
            ]
        ],
        "count" => 1,
        "success" => "Заказ обновлен",
    ];

    public static array $outgoingResponse = [
        "data" => [
            0 => [
                "data" => [
                    "order_id" => 2246,
                    "invoice_no" => 0,
                    "invoice_prefix" => "INV-2020-00",
                    "store_id" => 0,
                    "store_name" => "Такие дела",
                    "store_url" => "https://shop.takiedela.ru/",
                    "customer_id" => 23238,
                    "firstname" => "Даниил",
                    "lastname" => "Шевчук",
                    "email" => "d.shevchuk@nuzhnapomosh.ru",
                    "telephone" => "+7 913 892-63-42",
                    "custom_field" => [],
                    "shipping_address_1" => "обл. Новосибирская, г. Новосибирск, ул. Рассветная, ДОМ, 10",
                    "shipping_method" => "В пункт выдачи Сберпосылка",
                    "shipping_method_sum" => "264.0000",
                    "comment" => "",
                    "total" => "274.0000",
                    "order_status_id" => 9,
                    "order_status" => "Передано в 1С",
                    "affiliate_id" => 0,
                    "commission" => "0.0000",
                    "language_id" => 1,
                    "language_code" => "ru-ru",
                    "currency_id" => 1,
                    "currency_code" => "RUB",
                    "currency_value" => "1.00000000",
                    "ip" => "37.195.244.70",
                    "forwarded_ip" => "",
                    "user_agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36",
                    "accept_language" => "ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7",
                    "date_added" => "2021-04-28 12:54:27",
                    "date_modified" => "2021-08-18 16:30:23",
                ],
                "products" => [
                    0 => [
                        "order_product_id" => 3535,
                        "product_id" => 82,
                        "name" => "Тестовый товар",
                        "model" => "shoptestproduct998223242345",
                        "total" => "10.0000",
                        "quantity" => 1,
                        "image" => "https://shop.takiedela.ru/image/cache/catalog/TSHIRT_Tragicheskiy_content/tkontent2-120x120.jpg",
                        "author" => null,
                        "size" => "",
                        "download" => "",
                        "option" => [],
                    ]
                ]
            ]
        ],
        "count" => 1,
        "success" => "Заказ обновлен",
    ];

    public static array $structureResponse = [
        'data' => []
    ];
}
