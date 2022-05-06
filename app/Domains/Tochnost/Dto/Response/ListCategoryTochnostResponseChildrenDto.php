<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ListCategoryTochnostResponseChildrenDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="ListCategoryTochnostResponseChildrenDto",
 *     description="ListCategoryTochnostResponseChildrenDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="33",
 *     ),
 *     @OA\Property(
 *         property="order",
 *         type="integer",
 *         example=0,
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Дети",
 *     ), *
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         example="deti",
 *     ),
 *     @OA\Property(
 *         property="parent_id",
 *         type="integer",
 *         example="44",
 *     ),
 *     @OA\Property(
 *         property="name_d",
 *         type="string",
 *         example="Детям",
 *     ),
 *     @OA\Property(
 *         property="children",
 *         type="object",
 *         example="781302012",
 *     ),
 * )
 *
 */
class ListCategoryTochnostResponseChildrenDto extends DataTransferObject
{
    public int $id;
    public int $order;
    public string $name;
    public string $slug;
    public int $parent_id;
    public string $name_d;
}
