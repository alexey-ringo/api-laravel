<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class TokenAuthResponseDataDto
 * @package App\Domains\Auth\Dto\Response
 *
 * @OA\Schema(
 *     title="TokenAuthResponseDataDto",
 *     description="TokenAuthResponseDataDto",
 *     @OA\Property(
 *         property="token_type",
 *         type="string",
 *         example="Bearer",
 *     ),
 *     @OA\Property(
 *         property="expires_in",
 *         type="integer",
 *         example="2592000",
 *     ),
 *     @OA\Property(
 *         property="access_token",
 *         type="string",
 *         example="PkK7e9ZIIXVbRwLvDVkOBbIYDkk35uQfF6-8KOhQEJg4IWh-U3XsyqW8sEfLprQWHSBz25s9lM8mi5dJ6lA",
 *     ),
 *     @OA\Property(
 *         property="refresh_token",
 *         type="string",
 *         example="7ecc61b6981281ad14efc2387e2773d9f394eb0b1dcda5fdc67ba3f2ffe1c9b8a522b675e63069f697470e",
 *     ),
 * )
 *
 */
class TokenAuthResponseDataDto extends DataTransferObject
{
    public string $access_token;
    public string $token_type;
    public int $expires_in = 0;
    public string $refresh_token = '';
}
