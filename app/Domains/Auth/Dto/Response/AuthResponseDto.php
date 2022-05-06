<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class AuthResponseDto
 * @package App\Domains\Auth\Dto\Response
 *
 * @OA\Schema(
 *     title="AuthResponseDto",
 *     description="Auth Response",
 *     @OA\Property(
 *         property="status",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Success",
 *     ),
 * )
 *
 */
class AuthResponseDto extends DataTransferObject
{
    public bool $status;
    public array $data;
    public string $message;
}
