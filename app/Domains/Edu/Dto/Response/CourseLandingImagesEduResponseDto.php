<?php

namespace App\Domains\Edu\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CourseLandingImagesEduResponseDto
 * @package App\Domains\Edu\Dto\Response
 *
 * @OA\Schema(
 *     title="CourseLandingImagesEduResponseDto",
 *     description="CourseLandingImagesEduResponseDto",
 *     @OA\Property(
 *         property="thumb",
 *         type="string",
 *         example="https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/Dikman_course_cover-2.jpg",
 *     ),
 *     @OA\Property(
 *         property="cover",
 *         type="string",
 *         example="https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/Dikman_course_cover-1-scaled.jpg",
 *     ),
 *     @OA\Property(
 *         property="og",
 *         type="string",
 *         example="https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/12/image-1.png",
 *     ),
 * )
 *
 */
class CourseLandingImagesEduResponseDto extends DataTransferObject
{
    public string|null $thumb;
    public string|null $cover;
    public string|null $og;
}
