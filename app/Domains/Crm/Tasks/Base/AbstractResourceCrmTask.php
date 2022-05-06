<?php

namespace App\Domains\Crm\Tasks\Base;

use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourceCrmTask extends AbstractCrmTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseCrmRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();
        $this->fillResponseDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDto, statusCode: $this->response->status());
//
//        $responseDataDto = new $this->responseDataDtoClassName($this->responseJson['data']);
//        $this->fillResponseResourceDataDto();
//
//        return new ResourceResponseDto(responseDto: $this->responseResourceDataDto, statusCode: $this->response->status());
    }
}
