<?php

namespace App\Domains\Ps\Actions;

use App\Domains\Ps\Dto\Request\IndexEventPsRequestDto;
use App\Domains\Ps\Tasks\IndexEventPsTask;
use App\Parents\Dto\Response\ResourceCollectionDto;

/**
 * Class IndexEventPsAction
 * @package App\Domains\Ps\Actions
 */
class IndexEventPsAction
{
    /**
     * @var IndexEventPsTask
     */
    private IndexEventPsTask $indexEventPsTask;

    /**
     * StoreCounterpartyCrmAction constructor.
     * @param IndexEventPsTask $indexEventPsTask
     */
    public function __construct(IndexEventPsTask $indexEventPsTask)
    {
        $this->indexEventPsTask = $indexEventPsTask;
    }

    /**
     * @param IndexEventPsRequestDto $dto
     * @return ResourceCollectionDto
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(IndexEventPsRequestDto $dto): ResourceCollectionDto
    {
        return $this->indexEventPsTask->run($dto);
    }
}
