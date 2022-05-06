<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class UserAuthResponseDto
 * @package App\Domains\Auth\Dto\Response
 *
 * @OA\Schema(
 *     title="UserAuthResponseDto",
 *     description="UserAuthResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/UserAuthResponseDataDto",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Success",
 *     ),
 * )
 *
 */
class UserAuthResponseDto extends DataTransferObject
{
    public bool $status;
    public array $data;
    public string $message;
}
