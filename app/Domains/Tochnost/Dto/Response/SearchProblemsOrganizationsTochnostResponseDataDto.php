<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SearchProblemsOrganizationsTochnostResponseDataDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="SearchProblemsOrganizationsTochnostResponseDataDto",
 *     description="SearchProblemsOrganizationsTochnostResponseDataDto",
 *     @OA\Property(
 *         property="inn",
 *         type="string",
 *         example="7709669884",
 *     ),
 *     @OA\Property(
 *         property="ogrn",
 *         type="string",
 *         example="1067746461617",
 *     ),
 *     @OA\Property(
 *         property="kpp",
 *         type="string",
 *         example="770901001",
 *     ),
 *     @OA\Property(
 *         property="full_name",
 *         type="string",
 *         example="БЛАГОТВОРИТЕЛЬНЫЙ ФОНД МИЛОСЕРДИЕ",
 *     ),
 *     @OA\Property(
 *         property="logo",
 *         type="string",
 *         example="logo",
 *     ),
 *     @OA\Property(
 *         property="problems",
 *         type="array",
 *         @OA\Items()
 *     ),
 * )
 *
 */
class SearchProblemsOrganizationsTochnostResponseDataDto extends DataTransferObject
{
    public string|null $inn;
    public string|null $ogrn;
    public string|null $kpp;
    public string|null $full_name;
    public string|null $logo;
    public array $problems;
}
