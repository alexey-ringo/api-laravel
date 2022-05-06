<?php

namespace App\Domains\Core\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class FundCoreResponseDataDto
 * @package App\Domains\Core\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="FundCoreResponseDataDto",
 *     description="FundCoreResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         example="338",
 *     ),
 *     @OA\Property(
 *         property="coord_id",
 *         type="integer",
 *         example="26",
 *     ),
 *     @OA\Property(
 *         property="remote_id",
 *         type="integer",
 *         example="830",
 *     ),
 *     @OA\Property(
 *         property="uuid",
 *         type="string",
 *         example="7e206acb-5eb3-4303-9e14-93cb6aa881b5",
 *     ),
 *     @OA\Property(
 *         property="inn",
 *         type="string",
 *         example="2222222233",
 *     ),
 *     @OA\Property(
 *         property="kpp",
 *         type="string",
 *         example="111111177",
 *     ),
 *     @OA\Property(
 *         property="ogrn",
 *         type="string",
 *         example="1117746358677",
 *     ),
 *
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="11 фонд помощи онкобольным фонд помощи онкобольным (редактирует коорд-р)",
 *     ),
 *     @OA\Property(
 *         property="name_rod",
 *         type="string",
 *         example="фонд помощи онкобольным1112233 (редактирует коорд-р)",
 *     ),
 *     @OA\Property(
 *         property="name_dat",
 *         type="string",
 *         example="фонд помощи онкобольным1112233 (редактирует коорд-р)",
 *     ),
 *     @OA\Property(
 *         property="short_name",
 *         type="string",
 *         example="фонд помощи онкобольным1117qwdqwdqw (редактирует коорд-р)",
 *     ),
 *     @OA\Property(
 *         property="logo",
 *         type="string",
 *         example="https://dev.backend.core.nuzhnapomosh.ru/storage/fund_base/raaaaage_fOKKsCbpFpegjqqN0ZoVQe9CbGAISMy8uKeqEHLr.png",
 *     ),
 *     @OA\Property(
 *         property="desc",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="short_description",
 *         type="string",
 *         example="short description",
 *     ),
 *     @OA\Property(
 *         property="signatory",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="email@mail.ru",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="+79001234567",
 *     ),
 *     @OA\Property(
 *         property="site",
 *         type="string",
 *         example="https://test.com",
 *     ),
 *     @OA\Property(
 *         property="social",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="reg_date",
 *         type="string",
 *         example="2006-08-10",
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         example="deti-nashi",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="active",
 *     ),
 *     @OA\Property(
 *         property="publish",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="ebt_to_update",
 *         type="string",
 *         example="sent",
 *     ),
 *     @OA\Property(
 *         property="ebt_updated_at",
 *         type="string",
 *         example="2022-02-21T15:10:30.000000Z",
 *     ),
 *     @OA\Property(
 *         property="deleted_at",
 *         type="string",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2022-01-21T14:04:32.000000Z",
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         example="2022-02-21T15:10:30.000000Z",
 *     ),
 *
 *     @OA\Property(
 *         property="logo_300_px",
 *         type="string",
 *         example="https://dev.backend.core.nuzhnapomosh.ru/storage/fund_base/300px_llK0AjFE0oJSYLonqdYBUq2ZCVbkQdTKJfnG4BOh.png",
 *     ),
 *     @OA\Property(
 *         property="logo_600_px",
 *         type="string",
 *         example="https://dev.backend.core.nuzhnapomosh.ru/storage/fund_base/300px_llK0AjFE0oJSYLonqdYBUq2ZCVbkQdTKJfnG4BOh.png",
 *     ),
 *     @OA\Property(
 *         property="yr_address",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="fact_address",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="post_address",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="problems",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="regions",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="helps",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="groups",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="requisites",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */

class FundCoreResponseDataDto extends DataTransferObject
{
    public int $id;
    public int $user_id;
    public int|null $coord_id;
    public int|null $remote_id;
    public string $uuid;
    public string $inn;
    public string|null $kpp;
    public string|null $ogrn;
    public string|null $name;
    public string|null $name_rod;
    public string|null $name_dat;
    public string|null $short_name;
    public string|null $logo;
    public array|null $desc;
    public string|null $short_description;
    public array|null $signatory;
    public string|null $email;
    public string|null $phone;
    public string|null $site;
    public array|null $social;
    public string|null $reg_date;
    public string|null $slug;
    public string|null $status;
    public array|null $publish;
    public string|null $ebt_to_update;
    public string|null $ebt_updated_at;
    public string|null $deleted_at;
    public string|null $created_at;
    public string|null $updated_at;

    public string|null $logo_300_px;
    public string|null $logo_600_px;
    public array|null $yr_address;
    public array|null $fact_address;
    public array|null $post_address;
    public array|null $problems;
    public array|null $regions;
    public array|null $helps;
    public array|null $groups;
    public array|null $requisites;
}
