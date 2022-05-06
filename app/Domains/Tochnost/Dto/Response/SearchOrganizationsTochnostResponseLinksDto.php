<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SearchOrganizationsTochnostResponseLinksDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="SearchOrganizationResponseLinksDto",
 *     description="Search Organization Response Links",
 *     @OA\Property(
 *         property="first",
 *         type="string",
 *         example="https://dev.nko.tochno.st/api/service/organizations/search?page=1",
 *     ),
 *     @OA\Property(
 *         property="last",
 *         type="string",
 *         example="https://dev.nko.tochno.st/api/service/organizations/search?page=42",
 *     ),
 *     @OA\Property(
 *         property="prev",
 *         type="string",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="next",
 *         type="string",
 *         example="https://dev.nko.tochno.st/api/service/organizations/search?page=2",
 *     ),
 * )
 *
 */
class SearchOrganizationsTochnostResponseLinksDto extends DataTransferObject
{
    public string|null $first;
    public string|null $last;
    public string|null $prev;
    public string|null $next;
}
