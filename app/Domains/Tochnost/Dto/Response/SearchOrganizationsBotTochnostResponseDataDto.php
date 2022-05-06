<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SearchOrganizationsBotTochnostResponseDataDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="SearchOrganizationsBotTochnostResponseDataDto",
 *     description="SearchOrganizationsBotTochnostResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="33",
 *     ),
 *     @OA\Property(
 *         property="inn",
 *         type="string",
 *         example="1234567890",
 *     ),
 *     @OA\Property(
 *         property="short_name_visible",
 *         type="string",
 *         example="АиФ. Доброе сердце",
 *     ), *
 *     @OA\Property(
 *         property="is_verified",
 *         type="boolean",
 *         example="true",
 *     ),
 * )
 *
 */
class SearchOrganizationsBotTochnostResponseDataDto extends DataTransferObject
{
    public int $id;
    public string|null $inn;
    public string|null $short_name_visible;
    public bool $is_verified;
}
