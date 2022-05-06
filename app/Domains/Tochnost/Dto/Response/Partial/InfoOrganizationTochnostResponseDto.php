<?php

namespace App\Domains\Tochnost\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class InfoOrganizationTochnostResponseDto
 * @package App\Domains\Tochnost\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="InfoOrganizationTochnostResponseDto",
 *     description="InfoOrganizationTochnostResponseDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="image_600",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="images",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="short_description",
 *         type="string",
 *         example="Помощь детям и взрослым, больным раком",
 *     ),
 *     @OA\Property(
 *         property="case_id",
 *         type="integer",
 *         example="103",
 *     ),
 *     @OA\Property(
 *         property="sum_current",
 *         type="string",
 *         example="82703114.12",
 *     ),
 *     @OA\Property(
 *         property="month_sum",
 *         type="string",
 *         example="869321.5",
 *     ),
 *     @OA\Property(
 *         property="count_event",
 *         type="integer",
 *         example="293",
 *     ),
 *     @OA\Property(
 *         property="name_eng",
 *         type="string",
 *         example="advita",
 *     ),
 *     @OA\Property(
 *         property="regions",
 *         type="string",
 *         example="Санкт-Петербург",
 *     ),
 *     @OA\Property(
 *         property="publications_count",
 *         type="integer",
 *         example="80",
 *     ),
 *     @OA\Property(
 *         property="subscribers_count",
 *         type="integer",
 *         example="7753",
 *     ),
 *     @OA\Property(
 *         property="case",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class InfoOrganizationTochnostResponseDto extends DataTransferObject
{
    public int $id;
    public string $image_600;
    public string $images;
    public string $short_description;
    public int $case_id;
    public string $sum_current;
    public string $month_sum;
    public int $count_event;
    public string $name_eng;
    public string $regions;
    public int $publications_count;
    public int $subscribers_count;
    public array $case;
}
