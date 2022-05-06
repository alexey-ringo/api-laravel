<?php

namespace App\Domains\Auth\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;
use Illuminate\Support\Collection;

/**
 * Class UserAuthResponseDataDto
 * @package App\Domains\Auth\Dto\Response
 *
 * @OA\Schema(
 *     title="UserAuthResponseDataDto",
 *     description="UserAuthResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="12233",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="67@ya.ru",
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         example="67",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         example="lastname",
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
 *     @OA\Property(
 *         property="email_verified",
 *         type="bool",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="phone_verified",
 *         type="bool",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="social_identifiers",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/UserSocialIdAuthResponseDataDto"),
 *     ),
 *
 * )
 *
 */
class UserAuthResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $email;
    public string $firstname;
    public string|null $lastname;
    public string|null $patronymic;
    public string|null $fullname;
    public string|null $gender;
    public string|null $phone;
    public string|null $avatar;
    public string|null $country;
    public string|null $city;
    public bool $email_verified;
    public bool $phone_verified;
    //TODO cast array to Collection of UserSocialIdAuthResponseDataDto
//    public Collection $social_identifiers;
    public array $social_identifiers = [];
}
