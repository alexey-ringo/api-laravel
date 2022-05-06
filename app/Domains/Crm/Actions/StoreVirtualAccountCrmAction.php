<?php

namespace App\Domains\Crm\Actions;

use App\Domains\Crm\Dto\Request\StoreVirtualAccountCrmRequestDto;
use App\Domains\Crm\Tasks\StoreVirtualAccountCrmTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

/**
 * Class StoreVirtualAccountCrmAction
 * @package App\Domains\Crm\Actions
 */
class StoreVirtualAccountCrmAction
{
    /**
     * @var StoreVirtualAccountCrmTask
     */
    private StoreVirtualAccountCrmTask $storeVirtualAccountCrmTask;

    /**
     * StoreVirtualAccountCrmAction constructor.
     * @param StoreVirtualAccountCrmTask $storeVirtualAccountCrmTask
     */
    public function __construct(StoreVirtualAccountCrmTask $storeVirtualAccountCrmTask)
    {
        $this->storeVirtualAccountCrmTask = $storeVirtualAccountCrmTask;
    }

    /**
     * @param StoreVirtualAccountCrmRequestDto $dto
     * @return ResourceResponseDto
     * @throws ApiLogicalException
     * @throws ValidationException
     * @throws UnknownProperties
     */
    public function run(StoreVirtualAccountCrmRequestDto $dto): ResourceResponseDto
    {
        return $this->storeVirtualAccountCrmTask->run($dto);
    }
}
