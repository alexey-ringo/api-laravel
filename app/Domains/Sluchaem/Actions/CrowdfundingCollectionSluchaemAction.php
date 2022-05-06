<?php

namespace App\Domains\Sluchaem\Actions;

use App\Domains\Sluchaem\Dto\CollectionSluchaemRequestDto;
use App\Domains\Sluchaem\Tasks\CrowdfundingCollectionSluchaemTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class CrowdfundingCollectionSluchaemAction
 * @package App\Domains\Sluchaem\Actions
 */
class CrowdfundingCollectionSluchaemAction
{
    private CrowdfundingCollectionSluchaemTask $crowdfundingCollectionSluchaemTask;

    public function __construct(CrowdfundingCollectionSluchaemTask $crowdfundingCollectionSluchaemTask)
    {
        $this->crowdfundingCollectionSluchaemTask = $crowdfundingCollectionSluchaemTask;
    }

    public function run(CollectionSluchaemRequestDto $dto): ResourceResponseDto
    {
        return $this->crowdfundingCollectionSluchaemTask->run($dto);
    }
}
