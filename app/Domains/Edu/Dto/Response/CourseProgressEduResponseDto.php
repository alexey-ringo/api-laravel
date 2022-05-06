<?php

namespace App\Domains\Edu\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CourseProgressEduResponseDto
 * @package App\Domains\Edu\Dto\Response
 *
 * @OA\Schema(
 *     title="CourseProgressEduResponseDto",
 *     description="CourseProgressEduResponseDto",
 *     @OA\Property(
 *         property="percentage",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="completed",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="integer",
 *         example="8",
 *     ),
 *     @OA\Property(
 *         property="label",
 *         type="string",
 *         example="Пройдено",
 *     ),
 * )
 *
 */
class CourseProgressEduResponseDto extends DataTransferObject
{
    public int $percentage;
    public int $completed;
    public int $total;
    public string $label;
}
