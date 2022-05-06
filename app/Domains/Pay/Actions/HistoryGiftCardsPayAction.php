<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\HistoryGiftCardsPayRequestDto;
use App\Domains\Pay\Tasks\HistoryGiftCardsPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class HistoryGiftCardsPayAction
{
    private HistoryGiftCardsPayTask $historyGiftCardsPayTask;

    public function __construct(HistoryGiftCardsPayTask $historyGiftCardsPayTask)
    {
        $this->historyGiftCardsPayTask = $historyGiftCardsPayTask;
    }

    public function run(HistoryGiftCardsPayRequestDto $dto): ResourceResponseDto
    {
        return $this->historyGiftCardsPayTask->run($dto);
    }
}
