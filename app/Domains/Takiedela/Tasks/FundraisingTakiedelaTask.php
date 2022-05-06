<?php

namespace App\Domains\Takiedela\Tasks;

use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;
use App\Domains\Takiedela\Dto\Response\PostsTakiedelaResponseDataDto;
use App\Domains\Takiedela\Dto\Response\PostsTakiedelaResponseDto;
use App\Domains\Takiedela\Tasks\Base\AbstractTakiedelaTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FundraisingTakiedelaTask extends AbstractTakiedelaTask
{

    protected array $options;
    protected string $apiPath = '/posts';
    protected Response $response;

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(BaseTakiedelaRequestDto $dto): ResourceResponseDto
    {
        $defaultParams = [
            'token' => $this->token,
            'fr' => 1
        ];

        $params = array_merge($dto->toArrayNoGaps(), $defaultParams);

        $this->response = Http::withOptions($this->options)
            ->get($this->baseUri . $this->apiPath, $params);

        $responseJson = $this->response->json();

        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['posts'])
                || ! isset($responseJson['meta']) || ! isset($responseJson['count']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service '
                . $this->baseUri . $this->apiPath . ' !', 500);
        }
        $this->responseFailed();

        $responseDataDto = collect($responseJson['posts'])->map(function ($item) {
            return PostsTakiedelaResponseDataDto::fromRequest($item);
        });
        $responseDto = new PostsTakiedelaResponseDto(count: $responseJson['count'], data: $responseDataDto, meta: (object)$responseJson['meta']);

        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
    }
}
