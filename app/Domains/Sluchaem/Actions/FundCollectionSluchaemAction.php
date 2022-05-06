<?php

namespace App\Domains\Sluchaem\Actions;

use App\Domains\Sluchaem\Dto\CollectionSluchaemRequestDto;
use App\Domains\Sluchaem\Tasks\FundCollectionSluchaemTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class FondCollectionSluchaemAction
 * @package App\Domains\Sluchaem\Actions
 */
class FundCollectionSluchaemAction
{
    /**
     * @var FundCollectionSluchaemTask
     */
    private FundCollectionSluchaemTask $fundCollectionSluchaemTask;

    /**
     * FundCollectionSluchaemAction constructor.
     * @param FundCollectionSluchaemTask $fundCollectionSluchaemTask
     */
    public function __construct(FundCollectionSluchaemTask $fundCollectionSluchaemTask)
    {
        $this->fundCollectionSluchaemTask = $fundCollectionSluchaemTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(CollectionSluchaemRequestDto $dto): ResourceResponseDto
    {
        return $this->fundCollectionSluchaemTask->run($dto);
    }
}
