<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Domains\Crm\Tasks\AnnualUserReportCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class AnnualUserReportCrmAction
 * @package App\Domains\Crm\Actions
 */
class AnnualUserReportCrmAction
{
    public function run(BaseCrmRequestDto $dto, string $uuid): ResourceResponseDto
    {
        $showCounterpartyCrmTask = new AnnualUserReportCrmTask($uuid);

        return $showCounterpartyCrmTask->run($dto);
    }
}
