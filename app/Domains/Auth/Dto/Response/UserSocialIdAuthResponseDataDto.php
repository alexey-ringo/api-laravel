<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class UserSocialIdAuthResponseDataDto
 * @package App\Domains\Auth\Dto\Response
 *
 * @OA\Schema(
 *     title="UserSocialIdAuthResponseDataDto",
 *     description="UserSocialIdAuthResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="12233",
 *     ),
 *     @OA\Property(
 *         property="provider",
 *         type="string",
 *         example="telegram",
 *     ),
 *     @OA\Property(
 *         property="social_id",
 *         type="integer",
 *         example="123456789",
 *     ),
 * )
 *
 */
class UserSocialIdAuthResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $provider;
    public int $social_id;
}
