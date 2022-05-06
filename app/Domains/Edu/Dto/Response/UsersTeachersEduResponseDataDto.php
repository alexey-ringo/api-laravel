<?php

namespace App\Domains\Edu\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class UsersTeachersEduResponseDataDto
 * @package App\Domains\Edu\Dto\Response
 *
 * @OA\Schema(
 *     title="UsersTeachersEduResponseDataDto",
 *     description="UsersTeachersEduResponseDataDto",
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="global_user_id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="email@mail.ru",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Teacher",
 *     ),
 *     @OA\Property(
 *         property="registered",
 *         type="string",
 *         example="2020-01-31 09:32:45",
 *     ),
 *     @OA\Property(
 *         property="avatar",
 *         type="string",
 *         example="https://edu.nuzhnapomosh.ru/wp-content/uploads/2020/03/S",
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         example="https://edu.nuzhnapomosh.ru/author/alm",
 *     ),
 * )
 *
 */
class UsersTeachersEduResponseDataDto extends DataTransferObject
{
    public int $user_id;
    public int|null $global_user_id;
    public string $email;
    public string $name;
    public string $registered;
    public string $avatar;
    public string|null $url;
}
