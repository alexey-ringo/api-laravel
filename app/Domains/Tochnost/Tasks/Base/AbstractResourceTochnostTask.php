<?php

namespace App\Domains\Tochnost\Tasks\Base;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;
use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourceTochnostTask extends AbstractTochnostTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseTochnostRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();
        $this->fillResponseDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDto, statusCode: $this->response->status());
    }
}
