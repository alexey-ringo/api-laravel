<?php

namespace App\Domains\Edu\Tasks\Base;

use App\Domains\Edu\Dto\Base\BaseEduRequestDto;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Throwable;

abstract class AbstractCollectionEduTask extends AbstractEduTask
{
    /**
     * @throws UnknownProperties
     */
    public function run(BaseEduRequestDto $dto): ResourceCollectionDto
    {
        $this->sendHttp($dto);
        $total = 0;
        try {
            $this->responseValidationData();
            $this->fillResponseCollectionDataDto();

            $total = $this->responseJson['total'] ?? 0;
            if (isset($this->contentArrayName, $this->responseJson[$this->contentArrayName])) {
                $total = $this->responseJson[$this->contentArrayName] ['total'] ?? 0;
            }
        } catch (Throwable $e) {
            $this->responseCollectionDataDto = collect([]);
        }

        return new ResourceCollectionDto(collectionDto: $this->responseCollectionDataDto, total: $total, statusCode: $this->response->status());
    }
}
