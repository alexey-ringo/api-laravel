<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ShowOrganizationTochnostResponseDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="SearchOrganizationResponseDto",
 *     description="Search Organization Response",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="33",
 *     ),
 *     @OA\Property(
 *         property="order",
 *         type="integer",
 *         example=0,
 *     ),
 *     @OA\Property(
 *         property="full_name",
 *         type="string",
 *         example="НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ \БЛАГОТВОРИТЕЛЬНЫЙ ФОНД \ФОНД\",
 *     ),
 *     @OA\Property(
 *         property="short_name",
 *         type="string",
 *         example="НО \БФ \ФОНД\",
 *     ),
 *     @OA\Property(
 *         property="short_name_visible",
 *         type="string",
 *         example="Фонд",
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         example="фонд_1027805886713",
 *     ),
 *     @OA\Property(
 *         property="inn",
 *         type="string",
 *         example="7813125572",
 *     ),
 *     @OA\Property(
 *         property="ogrn",
 *         type="string",
 *         example="1027805886713",
 *     ),
 *     @OA\Property(
 *         property="kpp",
 *         type="string",
 *         example="781302012",
 *     ),
 *     @OA\Property(
 *         property="director",
 *         type="string",
 *         example="Иванов Иван Иванович",
 *     ),
 *     @OA\Property(
 *         property="reg_address",
 *         type="string",
 *         example="197022, г Санкт-Петербург, Петроградский р-н, пр-кт Большой П.С., д 55 литер а, пом 9Н",
 *     ),
 *     @OA\Property(
 *         property="reg_city",
 *         type="string",
 *         example="г Санкт-Петербург",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example=" +7 (812) 3327-22-33",
 *     ),
 *     @OA\Property(
 *         property="vk",
 *         type="string",
 *         example="https://vk.com/fund",
 *     ), *
 *     @OA\Property(
 *         property="ok",
 *         type="string",
 *         example="https://ok.ru/found",
 *     ),
 *     @OA\Property(
 *         property="instagram",
 *         type="string",
 *         example="https://www.instagram.com/fund_fund/",
 *     ),
 *     @OA\Property(
 *         property="fb",
 *         type="string",
 *         example="https://www.facebook.com/Fundfund",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="mail@fund.ru",
 *     ),
 *     @OA\Property(
 *         property="site",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="log_path",
 *         type="string",
 *         example="https://dev.nko.tochno.st/static/nko/1026806896682_Фонд.png",
 *     ),
 *     @OA\Property(
 *         property="short_description",
 *         type="string",
 *         example="Благотворительный фонд Фонд создан врачами клиники трансплантации костного мозга и волонтером в Санкт-Петербурге в 2002 году.",
 *     ),
 *     @OA\Property(
 *         property="description_note",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="registry_covid",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="registry_tax_deduction",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="foreign_organization",
 *         type="boolean",
 *         example="false",
 *     ),
 *    @OA\Property(
 *         property="russian_organization",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="community_service_provider",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="social_entrepreneur",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="social_service",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="is_active",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="has_logo",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="logo_agreement",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="foreign_agent",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="dobro",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="blago",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="sberbank",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="nuzhnapomosh",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="hasPresgrand",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="hasPotanin",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="reg_date",
 *         type="string",
 *         format="date-time",
 *         example="2002-12-10",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         example="2020-11-05T09:14:54.000000Z",
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         example="2020-12-23T15:02:45.000000Z",
 *     ),
 *     @OA\Property(
 *         property="has_report",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="initiator",
 *         type="string",
 *         example="",
 *     ),
 * )
 *
 */
class ShowOrganizationTochnostResponseDto extends DataTransferObject
{
    public int $id;
    public int $order;
    public string $full_name;
    public string $short_name;
    public string $short_name_visible;
    public string $slug;
    public string $inn;
    public string $ogrn;
    public string $kpp;
    public string $director;
    public string $reg_address;
    public string $reg_city;
    public string|null $phone;
    public string $vk = '';
    public string $ok = '';
    public string $instagram = '';
    public string $fb = '';
    public string $email = '';
    public string $site = '';
    public string $logo_path = '';
    public string $short_description = '';
    public string $description_note = '';
    public bool $registry_covid;
    public bool $registry_tax_deduction;
    public bool $foreign_organization;
    public bool $russian_organization;
    public bool $community_service_provider;
    public bool $social_entrepreneur;
    public bool $social_service;
    public bool $is_active;
    public bool $has_logo;
    public bool $logo_agreement;
    public bool $foreign_agent;
    public bool $dobro;
    public bool $blago;
    public bool $sberbank;
    public bool $nuzhnapomosh;
    public bool $hasPresgrand;
    public bool $hasPotanin;
    public string $reg_date;
    public string $created_at;
    public string $updated_at;
    public bool $has_report;
    public string $initiator = '';

    public array $helpers;
    public array $categories;
    public array $problems;
    public array $sites;
    public array $regions;
}
