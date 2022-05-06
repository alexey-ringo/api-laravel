<?php

namespace App\Domains\Edu\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CourseEduResponseDataDto
 * @package App\Domains\Edu\Dto\Response
 *
 * @OA\Schema(
 *     title="CourseEduResponseDataDto",
 *     description="CourseEduResponseDataDto",
 *     @OA\Property(
 *         property="course_id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="course_title",
 *         type="string",
 *         example="Задача не идёт. Честно обсуждаем решения, процессы и внедрения в НКО",
 *     ),
 *     @OA\Property(
 *         property="course_permalink",
 *         type="string",
 *         example="https://edu.nuzhnapomosh.ru/courses/marafon-15-09-2021/",
 *     ),
 *     @OA\Property(
 *         property="course_progress",
 *         type="object",
 *         ref="#/components/schemas/CourseProgressEduResponseDto",
 *     ),
 *     @OA\Property(
 *         property="course_last_activity",
 *         type="integer",
 *         example="0",
 *     ),
 * )
 *
 */
class CourseEduResponseDataDto extends DataTransferObject
{
    public int $course_id;
    public string $course_title;
    public string $course_permalink;
    public CourseProgressEduResponseDto $course_progress;
    public int $course_last_activity;
}
