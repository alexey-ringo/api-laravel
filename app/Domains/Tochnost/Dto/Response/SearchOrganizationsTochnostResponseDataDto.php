<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SearchOrganizationsTochnostResponseDataDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="SearchOrganizationsResponseDataDto",
 *     description="Search Organizations Response Data",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="33",
 *     ),
 *     @OA\Property(
 *         property="logo",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="short_name_visible",
 *         type="string",
 *         example="АиФ. Доброе сердце",
 *     ),
 *     @OA\Property(
 *         property="regions",
 *         type="string",
 *         example="Вся Россия",
 *     ),
 *     @OA\Property(
 *         property="has_presgrant",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="has_potanin",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="is_verified",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="path",
 *         type="string",
 *         example="aif_dobroe_serdce_1057748415977",
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         example="г Москва",
 *     ),
 *     @OA\Property(
 *         property="foreign_agent",
 *         type="boolean",
 *         example="false",
 *     ),
 * )
 *
 */
class SearchOrganizationsTochnostResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $logo = '';
    public string|null $short_name_visible;
    public string $regions;
    public bool $has_presgrant;
    public bool $has_potanin;
    public bool $is_verified;
    public string|null $path;
    public string|null $city;
    public bool $foreign_agent;
}
