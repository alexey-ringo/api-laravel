<?php

namespace App\Domains\Auth\Tasks\Base;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourceAuthTask extends AbstractAuthTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseAuthRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();
        $this->fillResponseDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDto, statusCode: $this->response->status());
    }
}
