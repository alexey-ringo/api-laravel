<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Request\SearchPaymentCrmRequestDto;
use App\Domains\Crm\Tasks\SearchPaymentCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class SearchPaymentCrmAction
 * @package App\Domains\Crm\Actions
 */
class SearchPaymentCrmAction
{
    /**
     * @var SearchPaymentCrmTask
     */
    private SearchPaymentCrmTask $searchPaymentCrmTask;

    /**
     * SearchCounterpartyCrmAction constructor.
     * @param SearchPaymentCrmTask $searchPaymentCrmTask
     */
    public function __construct(SearchPaymentCrmTask $searchPaymentCrmTask)
    {
        $this->searchPaymentCrmTask = $searchPaymentCrmTask;
    }

    /**
     * @param SearchPaymentCrmRequestDto $dto
     * @return ResourceResponseDto
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(SearchPaymentCrmRequestDto $dto): ResourceResponseDto
    {
        return $this->searchPaymentCrmTask->run($dto);
    }
}
