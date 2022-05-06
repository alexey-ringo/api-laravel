<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class TokenAuthResponseDto
 * @package App\Domains\Auth\Dto\Response
 *
 * @OA\Schema(
 *     title="TokenAuthResponseDto",
 *     description="TokenAuthResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/TokenAuthResponseDataDto",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Success",
 *     ),
 * )
 *
 */
class TokenAuthResponseDto extends DataTransferObject
{
    public bool $status;
    public array $data;
    public string $message;
}
