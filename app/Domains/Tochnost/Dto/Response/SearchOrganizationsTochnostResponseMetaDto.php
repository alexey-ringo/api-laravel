<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SearchOrganizationsTochnostResponseMetaDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="SearchOrganizationResponseMetaDto",
 *     description="Search Organization Response Meta",
 *     @OA\Property(
 *         property="current_page",
 *         type="integer",
 *         example="3",
 *     ),
 *     @OA\Property(
 *         property="from",
 *         type="integer",
 *         example="21",
 *     ),
 *     @OA\Property(
 *         property="last_page",
 *         type="integer",
 *         example="42",
 *     ),
 *     @OA\Property(
 *         property="next",
 *         type="string",
 *         example="https://dev.nko.tochno.st/api/service/organizations/search?page=2",
 *     ),
 * )
 *
 */
class SearchOrganizationsTochnostResponseMetaDto extends DataTransferObject
{
    public int $current_page;
    public int $from;
    public int $last_page;
    public array $links;
    public string $path;
    public int $per_page;
    public int $to;
    public int $total;
}
