<?php

namespace App\Domains\Sluchaem\Actions;

use App\Domains\Sluchaem\Dto\CollectionSluchaemRequestDto;
use App\Domains\Sluchaem\Tasks\CaseCollectionSluchaemTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class CaseCollectionSluchaemAction
 * @package App\Domains\Sluchaem\Actions
 */
class CaseCollectionSluchaemAction
{
    /**
     * @var CaseCollectionSluchaemTask
     */
    private CaseCollectionSluchaemTask $caseCollectionSluchaemTask;

    /**
     * CaseCollectionSluchaemAction constructor.
     * @param CaseCollectionSluchaemTask $caseCollectionSluchaemTask
     */
    public function __construct(CaseCollectionSluchaemTask $caseCollectionSluchaemTask)
    {
        $this->caseCollectionSluchaemTask = $caseCollectionSluchaemTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(CollectionSluchaemRequestDto $dto): ResourceResponseDto
    {
        return $this->caseCollectionSluchaemTask->run($dto);
    }
}
