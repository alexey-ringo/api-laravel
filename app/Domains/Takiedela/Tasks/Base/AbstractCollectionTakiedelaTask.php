<?php

namespace App\Domains\Takiedela\Tasks\Base;

use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractCollectionTakiedelaTask extends AbstractTakiedelaTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseTakiedelaRequestDto $dto): ResourceCollectionDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();

//        $iterableResponseArray = isset($this->contentArrayName) ? $this->responseJson[$this->contentArrayName] : $this->responseJson;
//        $this->responseCollectionDataDto = collect($iterableResponseArray)->map(function ($item) {
//            return new $this->responseDataDtoClassName($item);
//        });
        $this->fillResponseCollectionDataDto();

        return new ResourceCollectionDto(collectionDto: $this->responseCollectionDataDto, statusCode: $this->response->status());
    }
}
