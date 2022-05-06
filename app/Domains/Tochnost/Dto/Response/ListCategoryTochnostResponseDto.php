<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ListCategoryTochnostResponseDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="ListCategoryTochnostResponseDto",
 *     description="ListCategoryTochnostResponseDto",
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
 *         ref="#/components/schemas/ListCategoryTochnostResponseChildrenDto",
 *     ),
 * )
 *
 */
class ListCategoryTochnostResponseDto extends DataTransferObject
{
    public int $id;
    public int $order;
    public string $name;
    public string $slug;
    public int|null $parent_id;
    public string $name_d;
    //TODO cast from array to DTO
    public array $children;
}
