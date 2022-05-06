<?php

namespace App\Domains\Tochnost\Actions;

use App\Domains\Tochnost\Tasks\ShowOrganizationTochnostTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ShowOrganizationTochnostAction
{
    /**
     * @var ShowOrganizationTochnostTask
     */
    private ShowOrganizationTochnostTask $showTochnostTask;

    /**
     * ShowOrganizationsTochnostAction constructor.
     * @param ShowOrganizationTochnostTask $showTochnostTask
     */
    public function __construct(ShowOrganizationTochnostTask $showTochnostTask)
    {
        $this->showTochnostTask = $showTochnostTask;
    }

    public function run(int $inn): ResourceResponseDto
    {
        return $this->showTochnostTask->run($inn);
    }
}
