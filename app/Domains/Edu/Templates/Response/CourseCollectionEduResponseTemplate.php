<?php

namespace App\Domains\Edu\Templates\Response;

class CourseCollectionEduResponseTemplate
{
    public static array $remoteResponse = [
        0 => [
            "course_id" => 13324,
            "course_title" => "Принимающая сторона. Курс-гайд о работе с беженцами в России",
            "course_permalink" => "https://edu.nuzhnapomosh.ru/courses/guide-refugees-russia/",
            "course_progress" => [
                "percentage" => 0,
                "completed" => 0,
                "total" => 8,
                "label" => "Пройдено",
            ],
            "course_last_activity" => 0
        ]
    ];

    public static array $outgoingResponse = [
        'data' => [
            0 => [
                "course_id" => 13324,
                "course_title" => "Принимающая сторона. Курс-гайд о работе с беженцами в России",
                "course_permalink" => "https://edu.nuzhnapomosh.ru/courses/guide-refugees-russia/",
                "course_progress" => [
                    "percentage" => 0,
                    "completed" => 0,
                    "total" => 8,
                    "label" => "Пройдено",
                ],
                "course_last_activity" => 0
            ]
        ],
    ];

    public static array $structureResponse = [
        'data' => [
            [
                "course_id",
                "course_title",
                "course_permalink",
                "course_progress" => [
                    "percentage",
                    "completed",
                    "total",
                    "label",
                ],
                "course_last_activity"
            ]
        ],
    ];
}
