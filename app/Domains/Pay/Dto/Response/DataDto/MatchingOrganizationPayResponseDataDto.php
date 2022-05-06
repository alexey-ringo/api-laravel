<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class MatchingOrganizationPayResponseDataDto
 * @package App\Domains\Pay\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="MatchingOrganizationPayResponseDataDto",
 *     description="MatchingOrganizationPayResponseDataDto",
 *     @OA\Property(
 *         property="count_donation",
 *         type="integer",
 *         example="20",
 *     ),
 *     @OA\Property(
 *         property="count_project",
 *         type="integer",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="string",
 *         example="12",
 *     ),
 * )
 *
 */
class MatchingOrganizationPayResponseDataDto extends DataTransferObject
{
    public int $id;
    public int $user_id;
    public string $name;
    public string|null $logo;
    public string $inn;
    public string $kpp;
    public string $bik;
    public string $bank_name;
    public string $account_correspondent;
    public string $account_checking;
    public string $bank_address;
    public string $person;
    public string $email;
    public string $phone;
//Unknown types!!!
    public string|null $status;
    public string|null $flags;
    public string|null $tags;

    public int $sum;
}
