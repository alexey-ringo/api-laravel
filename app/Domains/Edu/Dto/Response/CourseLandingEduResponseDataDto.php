<?php

namespace App\Domains\Edu\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CourseLandingEduResponseDataDto
 * @package App\Domains\Edu\Dto\Response
 *
 * @OA\Schema(
 *     title="CourseLandingEduResponseDataDto",
 *     description="CourseLandingEduResponseDataDto",
 *     @OA\Property(
 *         property="course_id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="landing_id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         example="От намерений к результатам. Стратегическое планирование в благотворительности",
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         example="https://edu.nuzhnapomosh.ru/course/strategy-npo/",
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="paid",
 *     ),
 *     @OA\Property(
 *         property="images",
 *         type="object",
 *         ref="#/components/schemas/CourseLandingImagesEduResponseDto",
 *     ),
 * )
 *
 */
class CourseLandingEduResponseDataDto extends DataTransferObject
{
    public int|null $course_id;
    public int $landing_id;
    public string $title;
    public string $url;
    public string $type;
    public CourseLandingImagesEduResponseDto $images;
}
