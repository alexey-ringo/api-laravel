<?php

namespace App\Domains\Tochnost\Actions;

use App\Domains\Tochnost\Tasks\CountOrganizationsTochnostTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class CountOrganizationsTochnostAction
{
    /**
     * @var CountOrganizationsTochnostTask
     */
    private CountOrganizationsTochnostTask $countOrganizationsTochnostTask;

    /**
     * ShowOrganizationsTochnostAction constructor.
     * @param CountOrganizationsTochnostTask $countOrganizationsTochnostTask
     */
    public function __construct(CountOrganizationsTochnostTask $countOrganizationsTochnostTask)
    {
        $this->countOrganizationsTochnostTask = $countOrganizationsTochnostTask;
    }

    public function run(): ResourceResponseDto
    {
        return $this->countOrganizationsTochnostTask->run();
    }
}
