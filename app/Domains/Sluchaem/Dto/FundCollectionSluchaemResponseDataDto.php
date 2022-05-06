<?php

namespace App\Domains\Sluchaem\Dto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class FundCollectionSluchaemResponseDataDto
 * @package App\Domains\Sluchaem\Dto
 *
 * @OA\Schema(
 *     title="FundCollectionSluchaemResponseDataDto",
 *     description="Funds Response Data",
 *     @OA\Property(
 *         property="response_card_type",
 *         type="string",
 *         example="fund",
 *     ),
 *     @OA\Property(
 *         property="id",
 *         type="int",
 *         example="24",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="АдВита",
 *     ),
 *     @OA\Property(
 *         property="name_eng",
 *         type="string",
 *         example="advita",
 *     ),
 *     @OA\Property(
 *         property="inn",
 *         type="integer",
 *         example="7813165562",
 *     ),
 *     @OA\Property(
 *         property="name_case_rod",
 *         type="string",
 *         example="благотворительного фонда AdVita",
 *     ),
 *     @OA\Property(
 *         property="name_case_dat",
 *         type="string",
 *         example="благотворительному фонду AdVita",
 *     ),
 *     @OA\Property(
 *         property="name_case",
 *         type="string",
 *         example="АдВита",
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         example="НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ",
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         example="http://www.advita.ru/",
 *     ),
 *     @OA\Property(
 *         property="link",
 *         type="string",
 *         example="https://nuzhnapomosh.ru/funds/advita",
 *     ),
 *     @OA\Property(
 *         property="region",
 *         type="string",
 *         example="Санкт-Петербург",
 *     ),
 *     @OA\Property(
 *         property="regions_for_help",
 *         type="string",
 *         example="Санкт-Петербург",
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="fest_description",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="touch_description",
 *         type="string",
 *         example="Благотворительный фонд AdVita помогает пациентам сонкологическими, гематологическими,
 *         иммунологическими диагнозами и онкологическим отделениям федеральных и городских больниц Петербурга.",
 *     ),
 *     @OA\Property(
 *         property="full_description",
 *         type="string",
 *         example="Благотворительный фонд AdVita создан врачами клиники трансплантации костного мозга
 *         СПбГМУ им. И.П. Павлова и волонтером Павлом Гринбергом в Санкт-Петербурге",
 *     ),
 *     @OA\Property(
 *         property="short_description",
 *         type="string",
 *         example="Помощь детям и взрослым, больным раком",
 *     ),
 *     @OA\Property(
 *         property="director",
 *         type="string",
 *         example="Генеральный Директор",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="7 (921) 1112233",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="info@advita.ru",
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         example="/img/funds/1.png",
 *     ),
 *     @OA\Property(
 *         property="image_300",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="image_600",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="count_case",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="count_event",
 *         type="integer",
 *         example="265",
 *     ),
 *     @OA\Property(
 *         property="count_array",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/CaseCollectionSluchaemResponseDataDto"),
 *     ),
 *     @OA\Property(
 *         property="case",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/CaseCollectionSluchaemResponseDataDto"),
 *     ),
 *     @OA\Property(
 *         property="case_id",
 *         type="string",
 *         example="265",
 *     ),
 *     @OA\Property(
 *         property="category",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="active",
 *     ),
 *     @OA\Property(
 *         property="tag",
 *         type="string",
 *         example="touch",
 *     ),
 *     @OA\Property(
 *         property="estimate",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="flags",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="forever",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="matching",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="foreign",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="sum_rest",
 *         type="string",
 *         example="74 348",
 *     ),
 *     @OA\Property(
 *         property="sum_current",
 *         type="string",
 *         example="74 348",
 *     ),
 *     @OA\Xml(
 *         name="FundCollectionSluchaemResponseDataDto"
 *     )
 * )
 *
 */
class FundCollectionSluchaemResponseDataDto extends DataTransferObject
{
    public string $response_card_type;
    public int $id;
    public string $name;
    public string $name_eng = '';
    public int $inn = 0;
    public string $name_case_rod = '';
    public string $name_case_dat = '';
    public string $name_case = '';
    public string $title = '';
    public string $url;
    public string $link;
    public string $region;
    public string $regions_for_help;
    public string $description = '';
    public string $fest_description = '';
    public string $touch_description = '';
    public string $full_description;
    public string $short_description;
    public string $director;
    public string $phone;
    public string $email;
    public string $image;
    public string $image_300;
    public string $image_600;
    public int|string $count_case;
    public int|string $count_event;
    public array $count_array;
    public array $case = [];
    public string $case_id;
    public array $category;
    public string $status;
    public string $tag;
    public string $estimate = '';
    public string|null $flags;
    public string $forever = '';
    public array|bool $matching;
    public bool $foreign;
    public string $sum_rest;
    public string $sum_current;
}
