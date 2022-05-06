<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\CollectionDto\GiftCardCollectionPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class HistoryGiftCardsPayTask extends AbstractResourcePayTask
{
    protected string $contentArrayName = 'message';
    protected array $addParams = [
        'status' => 'status'
    ];
    protected string $apiPath = '/gift/history';
    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = GiftCardCollectionPayResponseDto::class;
}
