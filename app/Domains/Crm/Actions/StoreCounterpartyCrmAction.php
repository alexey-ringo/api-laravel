<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Request\StoreCounterpartyCrmRequestDto;
use App\Domains\Crm\Tasks\StoreCounterpartyCrmTask;
use App\Parents\Dto\Response\ResourceResponseDto;

/**
 * Class StoreCounterpartyCrmAction
 * @package App\Domains\Crm\Actions
 */
class StoreCounterpartyCrmAction
{
    /**
     * @var StoreCounterpartyCrmTask
     */
    private StoreCounterpartyCrmTask $storeCounterpartyCrmTask;

    /**
     * StoreCounterpartyCrmAction constructor.
     * @param StoreCounterpartyCrmTask $storeCounterpartyCrmTask
     */
    public function __construct(StoreCounterpartyCrmTask $storeCounterpartyCrmTask)
    {
        $this->storeCounterpartyCrmTask = $storeCounterpartyCrmTask;
    }

    /**
     * @param StoreCounterpartyCrmRequestDto $dto
     * @return ResourceResponseDto
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(StoreCounterpartyCrmRequestDto $dto): ResourceResponseDto
    {
        return $this->storeCounterpartyCrmTask->run($dto);
    }
}
