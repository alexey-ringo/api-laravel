<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\ShowMatchingOrganizationPayRequestDto;
use App\Domains\Pay\Tasks\ShowMatchingOrganizationPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class ShowMatchingOrganizationPayAction
{
    private ShowMatchingOrganizationPayTask $officeShowMatchingOrganizationPayTask;

    public function __construct(ShowMatchingOrganizationPayTask $officeShowMatchingOrganizationPayTask)
    {
        $this->officeShowMatchingOrganizationPayTask = $officeShowMatchingOrganizationPayTask;
    }

    public function run(ShowMatchingOrganizationPayRequestDto $dto): ResourceResponseDto
    {
        return $this->officeShowMatchingOrganizationPayTask->run($dto);
    }
}
