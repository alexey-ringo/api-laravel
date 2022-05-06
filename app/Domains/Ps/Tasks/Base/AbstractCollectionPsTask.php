<?php

namespace App\Domains\Ps\Tasks\Base;

use App\Domains\Ps\Dto\Base\BasePsRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractCollectionPsTask extends AbstractPsTask
{
    protected array $addParams = [];
    protected string $responseDataDtoClassName = '';

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BasePsRequestDto $dto): ResourceCollectionDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();

        $iterableResponseArray = isset($this->contentArrayName) ? $this->responseJson[$this->contentArrayName] : $this->responseJson;
        $responseDataDto = collect($iterableResponseArray)->map(function ($item) {
            return new $this->responseDataDtoClassName($item);
        });
        $count = $this->responseJson['count'] ?? 1;

        return new ResourceCollectionDto(collectionDto: $responseDataDto, count: $count, statusCode: $this->response->status());
    }
}
