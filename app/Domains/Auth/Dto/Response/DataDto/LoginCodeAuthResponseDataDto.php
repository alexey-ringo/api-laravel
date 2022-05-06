<?php

namespace App\Domains\Auth\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class LoginCodeAuthResponseDataDto
 * @package App\Domains\Auth\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="LoginCodeAuthResponseDataDto",
 *     description="LoginCodeAuthResponseDataDto",
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ94vV12uO4sMWoPmXPOUmH48dduiM9F",
 *     ),
 *     @OA\Property(
 *         property="refresh_token",
 *         type="string",
 *         example="572ab2659fc93dbbe7b5f4f5ef877be48b99b69137112c20b23csA3w-7_P4hOEO",
 *     ),
 * )
 *
 */
class LoginCodeAuthResponseDataDto extends DataTransferObject
{
    public string $access_token;
    public string $refresh_token;
}
