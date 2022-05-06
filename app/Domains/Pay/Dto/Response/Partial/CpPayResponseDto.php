<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CpPayResponseDto
 * @package App\Domains\Pay\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="CpPayResponseDto",
 *     description="CpPayResponseDto",
 *     @OA\Property(
 *         property="uuid",
 *         type="string",
 *         example="5ab6c231-16b0-4a0e-a929-7f05e058a72e",
 *     ),
 * )
 */
class CpPayResponseDto extends DataTransferObject
{
    public string|null $uuid;
}
