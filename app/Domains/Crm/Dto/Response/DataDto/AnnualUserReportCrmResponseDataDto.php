<?php

namespace App\Domains\Crm\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class AnnualUserReportCrmResponseDataDto
 * @package App\Domains\Crm\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="AnnualUserReportCrmResponseDataDto",
 *     description="AnnualUserReportCrmResponseDataDto",
 *     @OA\Property(
 *         property="uuid",
 *         type="string",
 *         example="099450ee-b1f2-4a5d-85df-c70c863e20af",
 *     ),
 *     @OA\Property(
 *         property="year",
 *         type="integer",
 *         example="2021",
 *     ),
 *     @OA\Property(
 *         property="user",
 *         type="object",
 *         @OA\Property(
 *             property="fullname",
 *             type="string",
 *             example="Ater2",
 *         ),
 *         @OA\Property(
 *             property="register_at",
 *             type="string",
 *             example="2021-08-30T12:22:30.000000Z",
 *         ),
 *         @OA\Property(
 *             property="first_donation",
 *             type="string",
 *             example="2021-08-30T14:35:21.000000Z",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="donations",
 *         type="object",
 *         @OA\Property(
 *             property="count",
 *             type="integer",
 *             example="14",
 *         ),
 *         @OA\Property(
 *             property="sum",
 *             type="integer",
 *             example="420",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="events",
 *         type="object",
 *         @OA\Property(
 *             property="count",
 *             type="integer",
 *             example="0",
 *         ),
 *         @OA\Property(
 *             property="sum",
 *             type="integer",
 *             example="0",
 *         ),
 *     ),
 *     @OA\Property(
 *         property="football_part",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="has_td_donations",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="has_sat_subscription",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="is_info_volunteer",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="cases",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="funds",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="problems",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class AnnualUserReportCrmResponseDataDto extends DataTransferObject
{
    public string $uuid;
    public int $year;
    public array $user;
    public array $donations;
    public array $events;
    public bool $football_part;
    public bool $has_td_donations;
    public bool $has_sat_subscription;
    public bool $is_info_volunteer;
    public array $funds;
    public array $cases;
    public array $problems;
}
