<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Request\SearchCounterpartyCrmRequestDto;
use App\Domains\Crm\Tasks\SearchCounterpartyCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class SearchCounterpartyCrmAction
 * @package App\Domains\Crm\Actions
 */
class SearchCounterpartyCrmAction
{
    /**
     * @var SearchCounterpartyCrmTask
     */
    private SearchCounterpartyCrmTask $searchCounterpartyCrmTask;

    /**
     * SearchCounterpartyCrmAction constructor.
     * @param SearchCounterpartyCrmTask $searchCounterpartyCrmTask
     */
    public function __construct(SearchCounterpartyCrmTask $searchCounterpartyCrmTask)
    {
        $this->searchCounterpartyCrmTask = $searchCounterpartyCrmTask;
    }

    /**
     * @param SearchCounterpartyCrmRequestDto $dto
     * @return ResourceResponseDto
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(SearchCounterpartyCrmRequestDto $dto): ResourceResponseDto
    {
        return $this->searchCounterpartyCrmTask->run($dto);
    }
}
