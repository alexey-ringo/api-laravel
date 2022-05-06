<?php

namespace App\Domains\Takiedela\Tasks\Base;

use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourseTakiedelaTask extends AbstractTakiedelaTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseTakiedelaRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();

//        $responseDataDtoArray = isset($this->contentArrayName) ? $this->responseJson[$this->contentArrayName] : $this->responseJson;
//        $this->responseResourceDataDto = new $this->responseDataDtoClassName($responseDataDtoArray);
//        $this->fillResponseResourceDataDto();
        $this->fillResponseDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDto, statusCode: $this->response->status());
    }
}
