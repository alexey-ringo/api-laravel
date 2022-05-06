<?php

namespace App\Domains\Core\Tasks\Base;

use App\Domains\Core\Dto\Base\BaseCoreRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiNotFoundException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourceCoreTask extends AbstractCoreTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     * @throws ApiNotFoundException
     */
    public function run(BaseCoreRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();
        $this->fillResponseDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDto, statusCode: $this->response->status());
    }
}
