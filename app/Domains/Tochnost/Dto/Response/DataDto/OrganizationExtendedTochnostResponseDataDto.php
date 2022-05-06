<?php

namespace App\Domains\Tochnost\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class OrganizationExtendedTochnostResponseDataDto
 * @package App\Domains\Tochnost\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="OrganizationExtendedTochnostResponseDataDto",
 *     description="OrganizationExtendedTochnostResponseDataDto",
 *     @OA\Property(
 *         property="inn",
 *         type="string",
 *         example="1234567890",
 *     ),
 *     @OA\Property(
 *         property="logo",
 *         type="string",
 *         example="https://nko.tochno.st/static/nko/images/uploads/heart.png",
 *     ),
 *     @OA\Property(
 *         property="short_name_visible",
 *         type="string",
 *         example="АиФ. Доброе сердце",
 *     ),
 *     @OA\Property(
 *         property="regions",
 *         type="integer",
 *         example="55",
 *     ),
 *     @OA\Property(
 *         property="regions_data",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="is_verified",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         example="г Москва",
 *     ),
 *     @OA\Property(
 *         property="foreign_agent",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="ext_info",
 *         type="object",
 *         ref="#/components/schemas/InfoOrganizationTochnostResponseDto",
 *     ),
 * )
 *
 */
class OrganizationExtendedTochnostResponseDataDto extends DataTransferObject
{
    public string $inn;
    public string $logo;
    public string $short_name_visible;
    public int|string $regions;
    public array $regions_data;
    public bool $is_verified;
    public string $city;
    public int $foreign_agent;
    public array $ext_info;
}
