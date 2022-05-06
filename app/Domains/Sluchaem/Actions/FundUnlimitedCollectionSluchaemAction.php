<?php

namespace App\Domains\Sluchaem\Actions;

use App\Domains\Sluchaem\Tasks\FundUnlimitedCollectionSluchaemTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class FondUnlimitedCollectionSluchaemAction
 * @package App\Domains\Sluchaem\Actions
 */
class FundUnlimitedCollectionSluchaemAction
{
    /**
     * @var FundUnlimitedCollectionSluchaemTask
     */
    private FundUnlimitedCollectionSluchaemTask $fundUnlimitedCollectionSluchaemTask;

    /**
     * FundUnlimitedCollectionSluchaemAction constructor.
     * @param FundUnlimitedCollectionSluchaemTask $fundUnlimitedCollectionSluchaemTask
     */
    public function __construct(FundUnlimitedCollectionSluchaemTask $fundUnlimitedCollectionSluchaemTask)
    {
        $this->fundUnlimitedCollectionSluchaemTask = $fundUnlimitedCollectionSluchaemTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(): ResourceResponseDto
    {
        return $this->fundUnlimitedCollectionSluchaemTask->run();
    }
}
