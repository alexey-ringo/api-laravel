<?php

namespace App\Domains\Sluchaem\Tasks;

use App\Domains\Sluchaem\Dto\FundCollectionSluchaemResponseDataDto;
use App\Domains\Sluchaem\Dto\FundCollectionSluchaemResponseDto;
use App\Domains\Sluchaem\Tasks\Base\AbstractSluchaemTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\Pagination\ResponseLinksDto;
use App\Parents\Dto\Response\Pagination\ResponseMetaDto;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FundUnlimitedCollectionSluchaemTask extends AbstractSluchaemTask
{
    const COUNT_PATH = '/Search/Count';
    const COLLECTION_TYPE = 'fund';
    const LIMIT = 20;

    protected string $apiPath = '/Search/PopupCreateEvent';
    protected string $contentArrayName = 'data';
    protected array $options;
    protected Response $response;

    private int $count = 0;

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function run(): ResourceResponseDto
    {
        $this->countCollection();
        $defaultParams = [
            'limit' => self::LIMIT,
            'type' => self::COLLECTION_TYPE,
            'count' => false
        ];

        $responses = Http::withOptions($this->options)->pool(function (Pool $pool) use ($defaultParams) {
            $concurrentRequests = [];
            $offset = 0;
            for ($i = 1; $i <= $this->count; $i = $i + self::LIMIT) {
                $params = array_merge(['offset' => $offset], $defaultParams);
                $concurrentRequests[] = $pool->withBasicAuth($this->username, $this->password)->get($this->baseUri . $this->apiPath, $params);
                $offset = $offset + self::LIMIT;
            }
            return $concurrentRequests;
        });

        $responseDataDto = collect([]);
        foreach ($responses as $responseItem) {
            $this->response = $responseItem;

            $this->responseValidationData();

            $responseDataArr = [];
            foreach ($this->responseJson['data'] as $item) {
                if (isset($item['response_card_type']) && $item['response_card_type'] === self::COLLECTION_TYPE) {
                    $responseDataArr[] = $item;
                }
            }
            $responseDataDtoItem = collect($responseDataArr)->map(function ($item) {
                return new FundCollectionSluchaemResponseDataDto($item);
            });
            $responseDataDto = $responseDataDto->merge($responseDataDtoItem);
        }

        $responseDto = new FundCollectionSluchaemResponseDto(
            data: $responseDataDto,
            links: $this->createResponseLinks(),
            meta: $this->createResponseMeta()
        );

        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
    }

    /**
     * @throws UnknownProperties
     */
    private function createResponseMeta(): array
    {
        return (new ResponseMetaDto(
            current_page: 1,
            from: 1,
            last_page: 1,
            links: [],
            path: route('api.v1.sluchaem.funds.all'),
            per_page: $this->count,
            to: $this->count,
            total: $this->count
        ))->toArray();
    }

    /**
     * @throws UnknownProperties
     */
    private function createResponseLinks(): array
    {
        return (new ResponseLinksDto(
            first: route('api.v1.sluchaem.funds.all'),
            last: route('api.v1.sluchaem.funds.all'),
            prev: null,
            next: null
        ))->toArray();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     * @throws ApiLogicalException
     */
    private function countCollection(): void
    {
        $this->response = Http::withBasicAuth($this->username, $this->password)->withOptions($this->options)
            ->get($this->baseUri . self::COUNT_PATH, ['type' => self::COLLECTION_TYPE]);

        $responseJson = $this->response->json();
        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['count']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service '
                . $this->baseUri . self::COUNT_PATH . ' !', 500);
        }
        $this->responseFailed();

        $this->count = $responseJson['count'];
    }
}
