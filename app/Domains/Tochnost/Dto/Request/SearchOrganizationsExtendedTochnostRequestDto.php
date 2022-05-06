<?php

namespace App\Domains\Tochnost\Dto\Request;

use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;
use App\Parents\Dto\Cast\MaxIntCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class SearchOrganizationsExtendedTochnostRequestDto extends BaseTochnostRequestDto
{
    public string|null $search_text;
    public string|null $problem_path;
    public array|null $problem_path_group;
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
    public bool|null $is_np_verify;
    public bool|null $foreign_agent;
    public int|null $object_help_first;
    public array|null $object_help_first_group;
    public int|null $object_help_second;
    public array|null $object_help_second_group;
    public int|null $object_help_third;
    public bool|null $registry_tax_deduction;
    public bool|null $fund;
    public int|null $type_of_help;
    public array|null $type_of_help_group;
    public int|null $type_of_nko;
    public string|null $type;
    public string|null $org_cats;
    public string|null $work_year;
    public string|null $income_source;
    public array|null $inns;
    public bool|null $is_charity;
    public string|null $income_source_slug;

    #[CastWith(MaxIntCaster::class)]
    public int $limit;
    public int|null $offset;

    public function __construct(array $data)
    {
        if (! isset($data['limit'])) {
            $data['limit'] = 30;
        }

        parent::__construct($data);
    }
}
