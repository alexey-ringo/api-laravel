<?php

namespace App\Domains\Edu\Tasks\Base;

use App\Domains\Edu\Dto\Base\BaseEduRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiNotFoundException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourceEduTask extends AbstractEduTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException|ApiNotFoundException
     */
    public function run(BaseEduRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();
        if ($this->responseJson['status'] === 'Failure') {
            throw new ApiNotFoundException($this->responseJson['message'] ?? 'Not found');
        }
        $this->fillResponseResourceDataDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDataDto, statusCode: $this->response->status());
    }
}
