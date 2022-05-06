<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class GiftCardPayResponseDataDto
 * @package App\Domains\Pqy\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="GiftCardPayResponseDataDto",
 *     description="GiftCardPayResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="408",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="string",
 *         example="80",
 *     ),
 *     @OA\Property(
 *         property="code",
 *         type="string",
 *         example="FRLC6DFXGETRHV",
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="in",
 *     ),
 *     @OA\Property(
 *         property="created",
 *         type="integer",
 *         example="1635245434",
 *     ),
 * )
 *
 */
class GiftCardPayResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $sum;
    public string $code;
    public string $type;
    public int|string $created;
}
