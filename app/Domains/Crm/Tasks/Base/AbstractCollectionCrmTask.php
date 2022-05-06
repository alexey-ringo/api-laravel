<?php

namespace App\Domains\Crm\Tasks\Base;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Illuminate\Validation\ValidationException;

abstract class AbstractCollectionCrmTask extends AbstractCrmTask
{
    /**
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseCrmRequestDto $dto): ResourceCollectionDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();
        $this->fillResponseCollectionDataDto();

        return new $this->resourceCollectionClassName(
            collectionDto: $this->responseCollectionDataDto,
            additional: $this->responseJson['additional'] ?? [],
            statusCode: $this->response->status()
        );
    }
}
