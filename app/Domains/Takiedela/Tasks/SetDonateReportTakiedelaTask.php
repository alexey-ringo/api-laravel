<?php

namespace App\Domains\Takiedela\Tasks;

use App\Domains\Takiedela\Dto\Response\ResponseDto\SetDonateReportTakiedelaResponseDto;
use App\Domains\Takiedela\Tasks\Base\AbstractResourseTakiedelaTask;
use App\Parents\Tasks\AbstractTask;

class SetDonateReportTakiedelaTask extends AbstractResourseTakiedelaTask
{
    protected bool $isOriginalContentWrapped = false;
    protected string $apiPath = '/reports_meta?token=545692343';
    protected string $responseDtoClassName = SetDonateReportTakiedelaResponseDto::class;
    protected string $httpType = AbstractTask::PUT_TYPE;

    // TODO: Dynamic init
//
//    /**
//     * @param string $apiPath
//     */
//    public function __construct()
//    {
//        $this->apiPath = '/reports_meta?token=' . $this->token;
//        parent::__construct();
//    }
}
