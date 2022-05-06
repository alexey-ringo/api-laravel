<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class UserAuthResponseDto
 * @package App\Domains\Auth\Dto\Response
 *
 *
 * @OA\Schema(
 *     title="UserAuthResponseDto",
 *     description="UserAuthResponseDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="241234",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="webmaster@email.ru",
 *     ),
 *     @OA\Property(
 *         property="username",
 *         type="string",
 *         example="webmaster@email.ru",
 *     ),
 *     @OA\Property(
 *         property="firstmane",
 *         type="string",
 *         example="Ivan",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="patronymic",
 *         type="string",
 *         example="patronymic",
 *     ),
 *     @OA\Property(
 *         property="fullname",
 *         type="string",
 *         example="67",
 *     ),
 *     @OA\Property(
 *         property="gender",
 *         type="string",
 *         example="lastname",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="79111234567",
 *     ),
 *     @OA\Property(
 *         property="avatar",
 *         type="string",
 *         example="path to img",
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         example="country",
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         example="city",
 *     ),
 * )
 *
 */
class FetchUserAuthResponseDto extends DataTransferObject
{
    public int $id;
    public string $email;
    public string $username;
    public string|null $firstname;
    public string|null $lastname;
    public string|null $patronymic;
    public string|null $fullname;
    public string|null $gender;
    public string|null $phone;
    public string|null $avatar;
    public string|null $country;
    public string|null $city;
}
