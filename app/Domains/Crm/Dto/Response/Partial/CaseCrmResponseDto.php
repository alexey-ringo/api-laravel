<?php

namespace App\Domains\Crm\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CaseCrmResponseDto
 * @package App\Domains\Crm\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="CaseCrmResponseDto",
 *     description="CaseCrmResponseDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Название сбора",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2013-11-01T04:18:00.000000Z",
 *     ),
 *     @OA\Property(
 *         property="closed_at",
 *         type="string",
 *         example="null",
 *     ),
 * )
 */
class CaseCrmResponseDto extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $created_at;
    public string|null $closed_at;
}
