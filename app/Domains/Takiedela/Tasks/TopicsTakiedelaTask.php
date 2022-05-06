<?php

namespace App\Domains\Takiedela\Tasks;

use App\Domains\Takiedela\Dto\Request\TopicsTakiedelaRequestDto;
use App\Domains\Takiedela\Dto\Response\TopicsTakiedelaResponseDataDto;
use App\Domains\Takiedela\Dto\Response\TopicsTakiedelaResponseDto;
use App\Domains\Takiedela\Tasks\Base\AbstractTakiedelaTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TopicsTakiedelaTask extends AbstractTakiedelaTask
{
    protected array $options;
    protected string $apiPath = '/topics';
    protected Response $response;

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(TopicsTakiedelaRequestDto $dto): ResourceResponseDto
    {
        $defaultParams = [
            'token' => $this->token
        ];

        $params = array_merge($dto->toArrayNoGaps(), $defaultParams);

        $this->response = Http::withOptions($this->options)
            ->get($this->baseUri . $this->apiPath, $params);

        $responseJson = $this->response->json();

        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['topics'])
                || ! isset($responseJson['count']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service!', 500);
        }
        $this->responseFailed();

        $responseDataDto = collect($responseJson['topics'])->map(function ($item) {
            return new TopicsTakiedelaResponseDataDto($item);
        });
        $responseDto = new TopicsTakiedelaResponseDto(count: $responseJson['count'], data: $responseDataDto);

        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
    }
}
