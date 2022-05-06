<?php

namespace App\Domains\Pay\Tasks\Base;

use App\Domains\Pay\Dto\Base\BasePayRequestDto;
use App\Domains\Pay\Tasks\ShowMatchingOrganizationPayTask;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiNotFoundException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractResourcePayTask extends AbstractPayTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     * @throws ApiNotFoundException
     */
    public function run(BasePayRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();

//        if (isset($this->responseJson['status'])) {
//            //Переделать ответ
//            if ($this->responseJson['status'] === 'Failure' && static::class === OfficeShowMatchingOrganizationPayTask::class) {
//                throw new ApiNotFoundException($this->responseJson['message'] ?? 'Not found', 404);
//            }
//
//
////            if ($this->responseJson['status'] === 'Failure' && static::class === OfficeCreateMatchingCampaignPayTask::class) {
////                throw new ApiLogicalException($this->responseJson['message'] ?? 'Internal server error', 500);
////            }
//        }
//        $this->fillResponseResourceDataDto();
        $this->fillResponseDto();
//        $responseResourceDto = $this->responseResourceDataDto ?? $this->responseResourceDto;

        return new ResourceResponseDto(responseDto: $this->responseResourceDto, statusCode: $this->response->status());
    }
}
