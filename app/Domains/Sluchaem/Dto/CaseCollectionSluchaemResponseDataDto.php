<?php

namespace App\Domains\Sluchaem\Dto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CaseCollectionSluchaemResponseDataDto
 * @package App\Domains\Sluchaem\Dto
 *
 * @OA\Schema(
 *     title="CaseCollectionSluchaemResponseDataDto",
 *     description="Cases Response Data",
 *     @OA\Property(
 *         property="response_card_type",
 *         type="string",
 *         example="case",
 *     ),
 *     @OA\Property(
 *         property="id",
 *         type="int",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="case_id",
 *         type="int",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Такие дела",
 *     ),
 *     @OA\Property(
 *         property="name_case_rod",
 *         type="string",
 *         example="портала «Такие дела»",
 *     ),
 *     @OA\Property(
 *         property="name_case_dat",
 *         type="string",
 *         example="порталу «Такие дела»",
 *     ),
 *     @OA\Property(
 *         property="link",
 *         type="string",
 *         example="https://takiedela.ru/topics/takie-dela",
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         example="https://takiedela.ru/wp-content/uploads/2017/08/td-333x240.jpg",
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="full_description",
 *         type="string",
 *         example="На сайте Такие дела публикуются новости, связанные с социальной проблематикой и благотворительностью.",
 *     ),
 *     @OA\Property(
 *         property="short_description",
 *         type="string",
 *         example="На сайте Такие дела публикуются новости",
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="int",
 *     ),
 *     @OA\Property(
 *         property="category",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="category_number",
 *         type="int",
 *         example="2",
 *     ),
 *     @OA\Property(
 *         property="text",
 *         type="string",
 *         example="На сайте Такие дела публикуются новости, связанные с социальной проблематикой и благотворительностью.
 *         Также на сайте ежедневно выходит один редакционный авторский материал и один фандрайзинговый.
 *         В этих статьях рассказывается о работе благотворительных фондов, для которых фонд Нужна помощь собирает деньги.
 *         С помощью этих материалов ведется сбор пожертвований на работу этих организаций.",
 *     ),
 *     @OA\Property(
 *         property="sum_rest",
 *         type="string",
 *         example="4 989 063",
 *     ),
 *     @OA\Property(
 *         property="sum_current",
 *         type="string",
 *         example="2 975 110",
 *     ),
 *     @OA\Property(
 *         property="sum_target",
 *         type="string",
 *         example="7 964 173",
 *     ),
 *     @OA\Property(
 *         property="sum_month",
 *         type="string",
 *         example="2 975 110",
 *     ),
 *     @OA\Property(
 *         property="int_sum",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="event_count",
 *         type="int",
 *         example="272",
 *     ),
 *     @OA\Property(
 *         property="path",
 *         type="string",
 *         example="takie-dela",
 *     ),
 *     @OA\Property(
 *         property="special",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="forever",
 *         type="string",
 *         example="1",
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
 *     @OA\Xml(
 *         name="CaseCollectionSluchaemResponseDataDto"
 *     )
 * )
 *
 */
class CaseCollectionSluchaemResponseDataDto extends DataTransferObject
{
    public string $response_card_type;
    public int $id;
    public int $case_id;
    public string $name;
    public string $case_name_rod;
    public string $case_name_dat;
    public string $link;
    public string $image;
    public string $description = '';
    public string $full_description;
    public string $short_description;
    public string $int = '';
    public array $category = [];
    public int $category_number;
    public string $text;
    public string $sum_rest;
    public string $sum_current;
    public string $sum_target;
    public string $sum_month;
    public array $int_sum = [];
    public int|string $event_count;
    public string $path;
    public bool $special;
    public string $forever;
    public array|bool $matching;
    public bool $foreign;
}
