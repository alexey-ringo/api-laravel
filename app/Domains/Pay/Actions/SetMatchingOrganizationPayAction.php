<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\SetMatchingOrganizationPayRequestDto;
use App\Domains\Pay\Tasks\SetMatchingOrganizationPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class SetMatchingOrganizationPayAction
{
    private SetMatchingOrganizationPayTask $officeSetMatchingOrganizationPayTask;

    public function __construct(SetMatchingOrganizationPayTask $officeSetMatchingOrganizationPayTask)
    {
        $this->officeSetMatchingOrganizationPayTask = $officeSetMatchingOrganizationPayTask;
    }

    public function run(SetMatchingOrganizationPayRequestDto $dto): ResourceResponseDto
    {
        return $this->officeSetMatchingOrganizationPayTask->run($dto);
    }
}
