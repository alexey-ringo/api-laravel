<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;
use Illuminate\Support\Collection;

/**
 * Class SearchOrganizationsTochnostResponse
 * @package App\Domains\Tochnost\Dto\ResponseDto
 *
 * @OA\Schema(
 *     title="SearchOrganizationResponseDto",
 *     description="Search Organization Response",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/SearchOrganizationsTochnostResponseDataDto"),
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/SearchOrganizationsTochnostResponseLinksDto"),
 *     ),
 *     @OA\Property(
 *         property="meta",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/SearchOrganizationsTochnostResponseMetaDto"),
 *     ),
 * )
 *
 */
class SearchOrganizationsTochnostResponseDto extends DataTransferObject
{
    public Collection $data;
    public array $links;
    public array $meta;
}
