<?php

namespace App\Domains\Tochnost\Tasks\Base;

use App\Domains\Tochnost\Dto\Base\BaseTochnostRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AbstractCollectionTochnostTask extends AbstractTochnostTask
{
    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseTochnostRequestDto $dto): ResourceCollectionDto
    {
//        $params = [
//            'token' => $this->token
//        ];
//
//        $this->response = Http::withOptions($this->options)
//            ->get($this->baseUri . $this->apiPath, $params);
//
//        $responseJson = $this->response->json();
//
//        if ($this->response->successful() && ! isset($responseJson)) {
//            throw new ApiLogicalException('Missing or incorrect response format from remote service!', 500);
//        }
//        $this->responseFailed();
//
//        $responseDataDto = collect($responseJson)->map(function ($item) {
//            return new $this->responseDataDtoClassName($item);
//        });

        $this->sendHttp($dto);
        $this->responseValidationData();
        $this->fillResponseCollectionDataDto();
        $count = 0;
        $total = 0;
        if (isset($this->responseJson['count'])) {
            $count = $this->responseJson['count'];
        }
        if (isset($this->responseJson['total'])) {
            $total = $this->responseJson['total'];
        }

        return new ResourceCollectionDto(collectionDto: $this->responseCollectionDataDto, count: $count, total: $total, statusCode: $this->response->status());
    }
}
