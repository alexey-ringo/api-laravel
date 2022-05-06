<?php

namespace App\Domains\Edu\Templates\Response;

class SearchCourseByUrlEduResponseTemplate
{
    public static array $remoteResponse = [
        "status" => true,
        "data" => [
            "course_id" => 13998,
            "landing_id" => 13475,
            "title" => "От намерений к результатам. Стратегическое планирование в благотворительности",
            "url" => "https://edu.nuzhnapomosh.ru/course/strategy-npo/",
            "type" => "paid",
            "images" => [
                "thumb" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/Dikman_course_cover-2.jpg",
                "cover" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/Dikman_course_cover-1-scaled.jpg",
                "og" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/image-1.png"
            ]
        ]
    ];

    public static array $outgoingResponse = [
        'data' => [
            "course_id" => 13998,
            "landing_id" => 13475,
            "title" => "От намерений к результатам. Стратегическое планирование в благотворительности",
            "url" => "https://edu.nuzhnapomosh.ru/course/strategy-npo/",
            "type" => "paid",
            "images" => [
                "thumb" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/Dikman_course_cover-2.jpg",
                "cover" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/Dikman_course_cover-1-scaled.jpg",
                "og" => "https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/image-1.png"
            ]
        ]
    ];

    public static array $structureResponse = [
        'data' => [
            "course_id",
            "landing_id",
            "title",
            "url",
            "type",
            "images" => [
                "thumb",
                "cover",
                "og"
            ]
        ],
    ];
}
