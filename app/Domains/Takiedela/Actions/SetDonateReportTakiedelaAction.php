<?php

namespace App\Domains\Takiedela\Actions;

use App\Domains\Takiedela\Dto\Request\SetDonateReportTakiedelaRequestDto;
use App\Domains\Takiedela\Tasks\SetDonateReportTakiedelaTask;
use App\Parents\Dto\Response\ResourceCollectionDto;
use App\Parents\Dto\Response\ResourceResponseDto;

class SetDonateReportTakiedelaAction
{
    private SetDonateReportTakiedelaTask $donateReportTakiedelaTask;

    public function __construct(SetDonateReportTakiedelaTask $donateReportTakiedelaTask)
    {
        $this->donateReportTakiedelaTask = $donateReportTakiedelaTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(SetDonateReportTakiedelaRequestDto $dto): ResourceResponseDto
    {
        return $this->donateReportTakiedelaTask->run($dto);
    }
}
