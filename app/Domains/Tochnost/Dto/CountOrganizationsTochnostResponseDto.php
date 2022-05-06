<?php

namespace App\Domains\Tochnost\Dto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CountOrganizationsTochnostResponseDto
 * @package App\Domains\Tochnost\Dto
 *
 * @OA\Schema(
 *     title="CountOrganizationsTochnostResponse",
 *     description="Count verify and active organization Response Data",
 *     @OA\Property(
 *         property="verify",
 *         type="integer",
 *         example="500",
 *     ),
 *     @OA\Property(
 *         property="active",
 *         type="integer",
 *         example="50000",
 *     ),
 * )
 *
 */
class CountOrganizationsTochnostResponseDto extends DataTransferObject
{
    public int $verify;
    public int $active;
}
