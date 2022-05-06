<?php

namespace App\Domains\Tochnost\Actions;

use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;
use App\Domains\Tochnost\Tasks\SearchProblemsOrganizationsTochnostTask;
use App\Parents\Dto\Response\ResourceCollectionDto;

class SearchProblemsOrganizationsTochnostAction
{
    const NP_SERVICE = 'np_service';

    /**
     * @var SearchProblemsOrganizationsTochnostTask
     */
    public SearchProblemsOrganizationsTochnostTask $searchProblemsOrganizationsTochnostTask;

    /**
     * SearchProblemsOrganizationsTochnostAction constructor.
     * @param SearchProblemsOrganizationsTochnostTask $searchProblemsOrganizationsTochnostTask
     */
    public function __construct(SearchProblemsOrganizationsTochnostTask $searchProblemsOrganizationsTochnostTask)
    {
        $this->searchProblemsOrganizationsTochnostTask = $searchProblemsOrganizationsTochnostTask;
    }

    public function run(BaseTochnostRequestDto $dto): ResourceCollectionDto
    {
        return $this->searchProblemsOrganizationsTochnostTask->run($dto);
    }
}
