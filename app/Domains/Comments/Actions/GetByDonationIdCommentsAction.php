<?php

namespace App\Domains\Comments\Actions;

use App\Domains\Comments\Dto\Request\GetByDonationIdCommentsRequestDto;
use App\Domains\Comments\Tasks\GetByDonationIdCommentsTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class GetByDonationIdCommentsAction
{
    private GetByDonationIdCommentsTask $getByDonationIdCommentsTask;

    public function __construct(GetByDonationIdCommentsTask $getByDonationIdCommentsTask)
    {
        $this->getByDonationIdCommentsTask = $getByDonationIdCommentsTask;
    }

    public function run(GetByDonationIdCommentsRequestDto $dto): ResourceResponseDto
    {
        return $this->getByDonationIdCommentsTask->run($dto);
    }
}
