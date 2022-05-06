<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\FilestorageCrmResponseDto;
use App\Domains\Crm\Dto\Request\FilestorageCrmRequestDto;
use App\Domains\Crm\Tasks\Base\AbstractCrmTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceCollectionDto;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FilestorageCrmTask extends AbstractCrmTask
{
    protected string $contentArrayName = 'data';

    protected string $apiPath = '/filestorage';

    protected string $responseDtoClassName = FilestorageCrmResponseDto::class;

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(FilestorageCrmRequestDto $dto): ResourceCollectionDto
    {

        $this->response = Http::withOptions($this->options)
            ->post($this->baseUri . $this->apiPath, $dto->toArrayNoGaps());

        $this->responseValidationData();

        $responseDataDto = collect($this->responseJson['data'])->map(function ($item) {
            return new FilestorageCrmResponseDto($item);
        });

        return new ResourceCollectionDto(collectionDto: $responseDataDto, statusCode: $this->response->status());
    }
}
