<?php

namespace App\Domains\Auth\Dto\Response\ResponseDto;

use App\Domains\Auth\Dto\Response\DataDto\LoginCodeAuthResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class LoginCodeAuthResponseDto
 * @package App\Domains\Auth\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="LoginCodeAuthResponseDto",
 *     description="LoginCodeAuthResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Success message",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/LoginCodeAuthResponseDataDto",
 *     ),
 * )
 *
 */
class LoginCodeAuthResponseDto extends DataTransferObject
{
    public bool $status;
    public string $message;
    public LoginCodeAuthResponseDataDto $data;
}
