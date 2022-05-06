<?php

namespace App\Domains\Tochnost\Actions;

use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;
use App\Domains\Tochnost\Tasks\SearchOrganizationsExtendedTochnostTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SearchOrganizationsExtendedTochnostAction
{
    /**
     * @var SearchOrganizationsExtendedTochnostTask
     */
    private SearchOrganizationsExtendedTochnostTask $searchOrganizationsExtendedTochnostTask;

    /**
     * SearchOrganizationsExtendedTochnostAction constructor.
     * @param SearchOrganizationsExtendedTochnostTask $searchOrganizationsExtendedTochnostTask
     */
    public function __construct(SearchOrganizationsExtendedTochnostTask $searchOrganizationsExtendedTochnostTask)
    {
        $this->searchOrganizationsExtendedTochnostTask = $searchOrganizationsExtendedTochnostTask;
    }

    public function run(BaseTochnostRequestDto $dto): ResourceResponseDto
    {
        return $this->searchOrganizationsExtendedTochnostTask->run($dto);
    }
}
