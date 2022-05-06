<?php

namespace App\Domains\Tochnost\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ClientsSearchOrganizationsTochnostResponseDataDto
 * @package App\Domains\Tochnost\Dto\Response
 *
 * @OA\Schema(
 *     title="ClientsSearchOrganizationsTochnostResponseDataDto",
 *     description="ClientsSearchOrganizationsTochnostResponseDataDto",
 *     @OA\Property(
 *         property="has_presgrant",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="has_potanin",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="has_mosru",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="is_verified",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="inn",
 *         type="string",
 *         example="7710475678",
 *     ),
 *     @OA\Property(
 *         property="ogrn",
 *         type="string",
 *         example="1067799022189",
 *     ),
 *     @OA\Property(
 *         property="kpp",
 *         type="string",
 *         example="772501123",
 *     ),
 *     @OA\Property(
 *         property="legal_form",
 *         type="string",
 *         example="Благотворительные фонды",
 *     ),
 *     @OA\Property(
 *         property="full_name",
 *         type="string",
 *         example="БЛАГОТВОРИТЕЛЬНЫЙ ФОНД",
 *     ),
 *     @OA\Property(
 *         property="director",
 *         type="string",
 *         example="Иванов Иван Иванович",
 *     ),
 *     @OA\Property(
 *         property="registration_date",
 *         type="string",
 *         example="2006-08-10",
 *     ),
 *     @OA\Property(
 *         property="registration_address",
 *         type="string",
 *         example="115114, г Москва, Даниловский р-н, Дербеневская наб",
 *     ),
 *     @OA\Property(
 *         property="short_name",
 *         type="string",
 *         example="ФОНД",
 *     ),
 *     @OA\Property(
 *         property="registration_region",
 *         type="string",
 *         example="Москва",
 *     ),
 *     @OA\Property(
 *         property="work_regions",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         example="+7 (495) 777-77-77",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Действующая",
 *     ),
 *     @OA\Property(
 *         property="income_sources",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="sites",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="vk",
 *         type="string",
 *         example="http://vk.com/",
 *     ),
 *     @OA\Property(
 *         property="ok",
 *         type="string",
 *         example="https://ok.ru/group/",
 *     ),
 *     @OA\Property(
 *         property="instagram",
 *         type="string",
 *         example="https://www.instagram.com/",
 *     ),
 *     @OA\Property(
 *         property="telegram",
 *         type="string",
 *         example="null",
 *     ),
 *     @OA\Property(
 *         property="fb",
 *         type="string",
 *         example="https://www.facebook.com/",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="example@mail.ru",
 *     ),
 *     @OA\Property(
 *         property="short_description",
 *         type="string",
 *         example="<p>Фонд работает с 2005 г.Миссия фонда",
 *     ),
 *     @OA\Property(
 *         property="expenses",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="requisites",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="foreign_agent",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="community_service_provider",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="social_service",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="categories",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="help_list",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="problems",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="has_report",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="incomes",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="government_entity_classifier",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class ClientsSearchOrganizationsTochnostResponseDataDto extends DataTransferObject
{
    public bool $has_presgrant;
    public bool $has_potanin;
    public bool $has_mosru;
    public bool $is_verified;
    public string|null $inn;
    public string|null $ogrn;
    public string|null $kpp;
    public string|null $legal_form;
    public string|null $full_name;
    public string|null $director;
    public string|null $registration_date;
    public string|null $registration_address;
    public string|null $short_name;
    public string|null $registration_region;
    public array $work_regions;
    public string|null $phone;
    public string|null $status;
    public array $income_sources;
    public array $sites;
    public string|null $vk;
    public string|null $ok;
    public string|null $instagram;
    public string|null $telegram;
    public string|null $fb;
    public string|null $email;
    public string|null $short_description;
    public array $expenses;
    public array $requisites;
    public bool $foreign_agent;
    public bool $community_service_provider;
    public bool $social_service;
    public array $categories;
    public array $help_list;
    public array $problems;
    public bool $has_report;
    public array $incomes;
    public array $government_entity_classifier;
}
