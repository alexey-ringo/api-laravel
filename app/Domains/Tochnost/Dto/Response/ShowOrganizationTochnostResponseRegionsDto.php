<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ShowOrganizationTochnostResponseRegionsDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="ShowOrganizationTochnostResponseRegionsDto",
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
class ShowOrganizationTochnostResponseRegionsDto extends DataTransferObject
{
    public int $id;
    public int $order;
    public string $name;
    public string $name_i;
    public string $slug;
}
