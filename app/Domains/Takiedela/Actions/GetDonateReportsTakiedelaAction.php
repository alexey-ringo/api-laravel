<?php

namespace App\Domains\Takiedela\Actions;

use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;
use App\Domains\Takiedela\Tasks\GetDonateReportsTakiedelaTask;
use App\Parents\Dto\Response\ResourceCollectionDto;

class GetDonateReportsTakiedelaAction
{
    private GetDonateReportsTakiedelaTask $donateReportsTakiedelaTask;

    public function __construct(GetDonateReportsTakiedelaTask $donateReportsTakiedelaTask)
    {
        $this->donateReportsTakiedelaTask = $donateReportsTakiedelaTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(BaseTakiedelaRequestDto $dto): ResourceCollectionDto
    {
        return $this->donateReportsTakiedelaTask->run($dto);
    }
}
