<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ShortCasePayResponseDto
 * @package App\Domains\Pay\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="ShortCasePayResponseDto",
 *     description="ShortCasePayResponseDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="9",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Олег Бочкарев",
 *     ),
 * )
 */
class ShortCasePayResponseDto extends DataTransferObject
{
    public int $id;
    public string $name;
}
