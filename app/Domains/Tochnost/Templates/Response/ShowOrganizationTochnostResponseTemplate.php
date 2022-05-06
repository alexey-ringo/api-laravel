<?php

namespace App\Domains\Tochnost\Templates\Response;

class ShowOrganizationTochnostResponseTemplate
{
    public static array $remoteResponse = [
        "data" => [
            'id' => 172,
            'order' => 0,
            'full_name' => "НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ БЛАГОТВОРИТЕЛЬНЫЙ ФОНД АДВИТА",
            'short_name' => "НО БФ АДВИТА",
            "short_name_visible" => "АдВита",
            "slug" => "advita_1027806886612",
            "inn" => "7813165562",
            "ogrn" => "1027806886612",
            "kpp" => "781301001",
            "director" => "Гринберг Павел Вадимович",
            "reg_address" => "197022, г Санкт-Петербург, Петроградский р-н, пр-кт Большой П.С., д 77 литер а, пом 8Н",
            "reg_city" => "г Санкт-Петербург",
            "phone" => " +7 (812) 337-27-33",
            "vk" => "https://vk.com/advitafund",
            "ok" => "https://ok.ru/foundadvita",
            "instagram" => "https://www.instagram.com/advita_fund/",
            "telegram" => null,
            "fb" => "https://www.facebook.com/AdVitafund",
            "email" => "mail@advita.ru.",
            "site" => null,
            "logo_path" => "https://nko.tochno.st/static/nko/1027806886612_Адвита.png",
            "short_description" => "Благотворительный фонд AdVita создан врачами клиники трансплантации костного мозга СПбГМУ им. И.П. Павлова и волонтером Павлом Гринбергом в Санкт-Петербурге в 2002 году.
                        Фонд помогает пациентам с онкологическими, гематологическими, иммунологическими диагнозами (независимо от возраста и прогноза) и онкологическим отделениям федеральных и городских больниц Петербурга.
                        Главный принцип работы Фонда — любой человек независимо от уровня доходов, возраста, национальности, места жительства, медицинского прогноза должен получить самое современное лечение.
                        Фонд оплачивает лекарства, обследования, поиск донора костного мозга в российском и международном регистре, обеспечивает иногородних подопечных жильем, оказывает материальную и социальную помощь семьям пациентов.",
            "description_note" => null,
            "registry_covid" => 1,
            "registry_tax_deduction" => 0,
            "foreign_organization" => 0,
            "russian_organization" => 1,
            "community_service_provider" => 0,
            "social_entrepreneur" => 0,
            "social_service" => 0,
            "is_active" => 1,
            "has_logo" => 1,
            "logo_agreement" => 0,
            "foreign_agent" => 0,
            "dobro" => true,
            "blago" => true,
            "sberbank" => true,
            "nuzhnapomosh" => true,
            "hasPresgrand" => true,
            "hasPotanin" => false,
            "reg_date" => "2002-12-10",
            "created_at" => "2020-11-05T09:14:54.000000Z",
            "updated_at" => "2020-12-23T15:02:45.000000Z",
            "has_report" => 1,
            "initiator" => null,
            "helpers" => [
                0 => [
                    "id" => 3,
                    "name" => "Медицинская помощь",
                    "slug" => "medicinskaya_pomoshh",
                    "description" => null,
                    "pivot" => [
                        "organization_id" => 172,
                        "help_list_id" => 3,
                    ]
                ],
                1 => [
                    "id" => 11,
                    "name" => "Социальная помощь/соц.сопровождение",
                    "slug" => "socialnaya_pomoshhsocsoprovozdenie",
                    "description" => null,
                    "pivot" => [
                        "organization_id" => 172,
                        "help_list_id" => 11,
                    ]
                ]
            ],
            "categories" => [
                0 => [
                    "id" => 138,
                    "order" => 0,
                    "name" => "Онкобольные",
                    "slug" => "onkobolnye",
                    "parent_id" => 113,
                    "name_d" => "Онкобольным",
                    "pivot" => [
                        "organization_id" => 172,
                        "category_id" => 138,
                    ]
                ],
                1 => [
                    "id" => 33,
                    "order" => 0,
                    "name" => "Онкобольные",
                    "slug" => "onkobolnye",
                    "parent_id" => null,
                    "name_d" => "Онкобольным",
                    "pivot" => [
                        "organization_id" => 172,
                        "category_id" => 33,
                    ]
                ]
            ],
            "problems" => [
                0 => [
                    "id" => 10,
                    "name" => "Детская смертность",
                    "slug" => "detskaya_smertnost",
                    "description" => null,
                    "is_active" => 0,
                    "pivot" => [
                        "organization_id" => 172,
                        "problem_id" => 10,
                    ]
                ],
                1 => [
                    "id" => 11,
                    "name" => "Детство",
                    "slug" => "childhood",
                    "description" => null,
                    "is_active" => 1,
                    "pivot" => [
                        "organization_id" => 172,
                        "problem_id" => 11,
                    ]
                ],
                2 => [
                    "id" => 20,
                    "name" => "Онкология",
                    "slug" => "oncology",
                    "description" => null,
                    "is_active" => 1,
                    "pivot" => [
                        "organization_id" => 172,
                        "problem_id" => 20,
                    ]
                ],
                3 => [
                    "id" => 23,
                    "name" => "Паллиатив",
                    "slug" => "palliativ",
                    "description" => null,
                    "is_active" => 0,
                    "pivot" => [
                        "organization_id" => 172,
                        "problem_id" => 23,
                    ]
                ],
                4 => [
                    "id" => 28,
                    "name" => "Развитие здравоохранения",
                    "slug" => "razvitie_zdravooxraneniya",
                    "description" => null,
                    "is_active" => 0,
                    "pivot" => [
                        "organization_id" => 172,
                        "problem_id" => 28,
                    ]
                ]
            ],
            "sites" => [
                0 => [
                    "id" => 172,
                    "organization_id" => 172,
                    "site" => "http://www.advita.ru",
                ]
            ],
            "regions" => [
                0 => [
                    "id" => 1,
                    "order" => 100,
                    "name" => "Вся Россия",
                    "name_i" => "Вся Россия",
                    "slug" => "all_russia",
                    "pivot" => [
                        "organization_id" => 172,
                        "region_id" => 1,
                    ]
                ]
            ]
        ]
    ];

    public static array $fakeResponse = [
        "data" => [
            "id" => 172,
            "order" => 0,
            "full_name" => "НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ БЛАГОТВОРИТЕЛЬНЫЙ ФОНД АДВИТА",
            "short_name" => "НО БФ АДВИТА",
            "short_name_visible" => "АдВита",
            "slug" => "advita_1027806886612",
            "inn" => "7813165562",
            "ogrn" => "1027806886612",
            "kpp" => "781301001",
            "director" => "Гринберг Павел Вадимович",
            "reg_address" => "197022, г Санкт-Петербург, Петроградский р-н, пр-кт Большой П.С., д 77 литер а, пом 8Н",
            "reg_city" => "г Санкт-Петербург",
            "phone" => " +7 (812) 337-27-33",
            "vk" => "https://vk.com/advitafund",
            "ok" => "https://ok.ru/foundadvita",
            "instagram" => "https://www.instagram.com/advita_fund/",
            "fb" => "https://www.facebook.com/AdVitafund",
            "email" => "mail@advita.ru.",
            "site" => "",
            "logo_path" => "https://nko.tochno.st/static/nko/1027806886612_Адвита.png",
            "short_description" => "Благотворительный фонд AdVita создан врачами клиники трансплантации костного мозга СПбГМУ им. И.П. Павлова и волонтером Павлом Гринбергом в Санкт-Петербурге в 2002 году. Фонд помогает пациентам с онкологическими, гематологическими, иммунологическими диагнозами (независимо от возраста и прогноза) и онкологическим отделениям федеральных и городских больниц Петербурга. Главный принцип работы Фонда — любой человек независимо от уровня доходов, возраста, национальности, места жительства, медицинского прогноза должен получить самое современное лечение. Фонд оплачивает лекарства, обследования, поиск донора костного мозга в российском и международном регистре, обеспечивает иногородних подопечных жильем, оказывает материальную и социальную помощь семьям пациентов.",
            "description_note" => "",
            "registry_covid" => true,
            "registry_tax_deduction" => false,
            "foreign_organization" => false,
            "russian_organization" => true,
            "community_service_provider" => false,
            "social_entrepreneur" => false,
            "social_service" => false,
            "is_active" => true,
            "has_logo" => true,
            "logo_agreement" => false,
            "foreign_agent" => false,
            "dobro" => true,
            "blago" => true,
            "sberbank" => true,
            "nuzhnapomosh" => true,
            "hasPresgrand" => true,
            "hasPotanin" => false,
            "reg_date" => "2002-12-10",
            "created_at" => "2020-11-05T09:14:54.000000Z",
            "updated_at" => "2020-12-23T15:02:45.000000Z",
            "has_report" => true,
            "initiator" => "",
            "helpers" => [
                0 => [
                    "id" => 3,
                    "name" => "Медицинская помощь",
                    "slug" => "medicinskaya_pomoshh",
                    "description" => "",
                ],
                1 => [
                    "id" => 11,
                    "name" => "Социальная помощь/соц.сопровождение",
                    "slug" => "socialnaya_pomoshhsocsoprovozdenie",
                    "description" => "",
                ]
            ],
            "categories" => [
                0 => [
                    "id" => 138,
                    "order" => false,
                    "name" => "Онкобольные",
                    "slug" => "onkobolnye",
                    "parent_id" => 113,
                    "name_d" => "Онкобольным",
                ],
                1 => [
                    "id" => 33,
                    "order" => false,
                    "name" => "Онкобольные",
                    "slug" => "onkobolnye",
                    "parent_id" => null,
                    "name_d" => "Онкобольным",
                ]
            ],
            "problems" => [
                0 => [
                    "id" => 10,
                    "name" => "Детская смертность",
                    "slug" => "detskaya_smertnost",
                    "description" => "",
                    "is_active" => false,
                ],
                1 => [
                    "id" => 11,
                    "name" => "Детство",
                    "slug" => "childhood",
                    "description" => "",
                    "is_active" => true,
                ],
                2 => [
                    "id" => 20,
                    "name" => "Онкология",
                    "slug" => "oncology",
                    "description" => "",
                    "is_active" => true,
                ],
                3 => [
                    "id" => 23,
                    "name" => "Паллиатив",
                    "slug" => "palliativ",
                    "description" => "",
                    "is_active" => false,
                ],
                4 => [
                    "id" => 28,
                    "name" => "Развитие здравоохранения",
                    "slug" => "razvitie_zdravooxraneniya",
                    "description" => "",
                    "is_active" => false,
                ]
            ],
            "sites" => [
                0 => [
                    "id" => 172,
                    "organization_id" => 172,
                    "site" => "http://www.advita.ru",
                ]
            ],
            "regions" => [
                0 => [
                    "id" => 1,
                    "order" => 100,
                    "name" => "Вся Россия",
                    "name_i" => "Вся Россия",
                    "slug" => "all_russia",
                ]
            ]
        ]
    ];

    public static array $structureResponse = [
        "data" => [
            'id',
            "order",
            "full_name",
            "short_name",
            "short_name_visible",
            "slug",
            "inn",
            "ogrn",
            "kpp",
            "director",
            "reg_address",
            "reg_city",
            "phone",
            "vk",
            "ok",
            "instagram",
            "fb",
            "email",
            "site",
            "logo_path",
            "short_description",
            "description_note",
            "registry_covid",
            "registry_tax_deduction",
            "foreign_organization",
            "russian_organization",
            "community_service_provider",
            "social_entrepreneur",
            "social_service",
            "is_active",
            "has_logo",
            "logo_agreement",
            "foreign_agent",
            "dobro",
            "blago",
            "sberbank",
            "nuzhnapomosh",
            "hasPresgrand",
            "hasPotanin",
            "reg_date",
            "created_at",
            "updated_at",
            "has_report",
            "initiator",
            "helpers" => [
                0 => [
                    "id",
                    "name",
                    "slug",
                    "description",
                ],
                1 => [
                    "id",
                    "name",
                    "slug",
                    "description",
                ]
            ],
            "categories" => [
                0 => [
                    "id",
                    "order",
                    "name",
                    "slug",
                    "parent_id",
                    "name_d",
                ],
                1 => [
                    "id",
                    "order",
                    "name",
                    "slug",
                    "parent_id",
                    "name_d",
                ]
            ],
            "problems" => [
                0 => [
                    "id",
                    "name",
                    "slug",
                    "description",
                    "is_active",
                ],
                1 => [
                    "id",
                    "name",
                    "slug",
                    "description",
                    "is_active",
                ],
                2 => [
                    "id",
                    "name",
                    "slug",
                    "description",
                    "is_active",
                ],
                3 => [
                    "id",
                    "name",
                    "slug",
                    "description",
                    "is_active",
                ],
                4 => [
                    "id",
                    "name",
                    "slug",
                    "description",
                    "is_active",
                ]
            ],
            "sites" => [
                0 => [
                    "id",
                    "organization_id",
                    "site",
                ]
            ],
            "regions" => [
                0 => [
                    "id",
                    "order",
                    "name",
                    "name_i",
                    "slug",
                ]
            ]
        ]
    ];
}
