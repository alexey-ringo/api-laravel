<?php

namespace App\Domains\Ps\Tasks\Base;

use App\Domains\Ps\Dto\Base\BasePsRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourcePsTask extends AbstractPsTask
{
    protected string $contentArrayName = 'data';
//    protected string $responseDtoClassName = '';

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BasePsRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();

//        $responseDataDto = new $this->responseDtoClassName($this->responseJson['data']);
        $this->fillResponseResourceDataDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDataDto, statusCode: $this->response->status());
    }
}
