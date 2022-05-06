<?php

namespace App\Domains\Core\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class FundCoreResponseDataDto
 * @package App\Domains\Pqy\Dto\Response\DataDto
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
 *         property="remote_id",
 *         type="integer",
 *         example="80",
 *     ),
 *     @OA\Property(
 *         property="fund_id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="application_id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="uuid",
 *         type="string",
 *         example="9675e665-1923-4c6f-97c0-259b191fab24",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Тестовый сбор",
 *     ),
 *     @OA\Property(
 *         property="name_dat",
 *         type="string",
 *         example="Тестовому сбору",
 *     ),
 *     @OA\Property(
 *         property="name_rod",
 *         type="string",
 *         example="Тестового сбора",
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         example="Описание тестового сбора",
 *     ),
 *     @OA\Property(
 *         property="problems",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="date_close",
 *         type="string",
 *         example="2022-01-20T00:00:00.000000Z",
 *     ),
 *     @OA\Property(
 *         property="external",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="statutory",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="close",
 *     ),
 *     @OA\Property(
 *         property="target_sum",
 *         type="integer",
 *         example="15000000",
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         example="liga-spravedlivosti-imeni-vi-lenina",
 *     ),
 *     @OA\Property(
 *         property="forever",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="carousel",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="slider",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="deleted_at",
 *         type="integer",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="integer",
 *         example="2022-01-19T11:56:32.000000Z",
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="integer",
 *         example="2022-01-20T07:39:37.000000Z",
 *     ),
 *
 *     @OA\Property(
 *         property="lead",
 *         type="string",
 *         example="Информационный  портал благотворительного фонда Нужна помощь",
 *     ),
 *     @OA\Property(
 *         property="full_description",
 *         type="string",
 *         example="Информационный портал благотворительного фонда Нужна помощь",
 *     ),
 * )
 *
 */
class CaseCoreResponseDataDto extends DataTransferObject
{
    public int $id;
    public int|null $remote_id;
    public int $fund_id;
    public int|null $application_id;
    public string $uuid;
    public string|null $name;
    public string|null $name_dat;
    public string|null $name_rod;
    public string|null $description;
    public array $problems;
    public string|null $date_close;
    public bool|null $external;
    public bool|null $statutory;
    public string|null $status;
    public int|null $target_sum;
    public string|null $slug;
    public int|null $forever;
    public int|null $carousel;
    public int|null $slider;
    public string|null $deleted_at;
    public string|null $created_at;
    public string|null $updated_at;

    public string|null $lead;
    public string|null $full_description;

    public string|null $final_text_report;
    public string|null $image;
    public string|null $estimate;
    public string|null $documents;
    public string|null $final_financial_report;
}
