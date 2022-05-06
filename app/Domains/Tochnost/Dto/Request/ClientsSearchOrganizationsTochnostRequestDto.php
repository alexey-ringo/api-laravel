<?php

namespace App\Domains\Tochnost\Dto\Request;

use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;

class ClientsSearchOrganizationsTochnostRequestDto extends BaseTochnostRequestDto
{
    //ИНН/ОГРН/короткое название
    public string|null $search_text;
    public string|null $problem_path;
    public string|null $region_registry;
    public string|null $region_path;
    public bool|null $is_grant_president;
    public bool|null $is_grant_potanin;
    public bool|null $is_opu;
    public bool|null $is_psu;
    public bool|null $is_covid;
    public bool|null $is_site;
    public bool|null $has_report;
    public bool|null $is_verify;
    public bool|null $foreign_agent;
    public int|null $object_help_first;
    public int|null $object_help_second;
    public int|null $object_help_third;
    public bool|null $registry_tax_deduction;
    public int|null $type_of_help;
    public int|null $type_of_nko;
    public string|null $type;
    public string|null $org_cats;
    public string|null $work_year;
    public bool|null $is_np_verify;

    public int|null $limit;
    public int|null $offset;
}
