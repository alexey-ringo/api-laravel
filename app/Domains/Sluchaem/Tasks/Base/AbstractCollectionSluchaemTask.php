<?php

namespace App\Domains\Sluchaem\Tasks\Base;

use App\Domains\Sluchaem\Dto\CollectionSluchaemRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\Pagination\ResponseLinksDto;
use App\Parents\Dto\Response\Pagination\ResponseMetaDto;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractCollectionSluchaemTask extends AbstractSluchaemTask
{
    protected array $options;
    protected string $collectionType = '';
    protected string $responseDataDtoClassName = '';
    protected string $responseDataClassName = '';
    protected string $ourApiMethodRouteName = '';
    protected Response $response;

    private int $limit = 10;
    private int $page = 1;
    private int $responseQueryMetadataOffset;
    private int $responseQueryMetadataCount;
    private bool $isPagination = true;

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function run(CollectionSluchaemRequestDto $dto): ResourceResponseDto
    {
        if (isset($dto->limit)) {
            $this->limit = max($dto->limit, 1);
        }
        if ($this->limit > 10 && $this->limit <= 20) {
            $this->options['timeout'] = 20;
        }
        if ($this->limit > 20 && $this->limit <= 40) {
            $this->options['timeout'] = 30;
        }
        if ($this->limit > 40 && $this->limit <= 60) {
            $this->options['timeout'] = 40;
        }
        if ($this->limit > 60) {
            throw new ApiLogicalException('Too large limit selected.Use method ' . route('api.v1.sluchaem.funds.all'), 422);
        }

        $defaultParams = [];
        if (isset($dto->offset)) {
            $defaultParams = [
                'limit' => $this->limit,
                'offset' => $dto->offset,
                'type' => $this->collectionType,
                'count' => true
            ];
            $this->isPagination = false;
        } else {
            if (isset($dto->page)) {
                $this->page = max($dto->page, 1);
                $dto->page = null;
            }
            $defaultParams = [
                'limit' => $this->limit,
                'offset' => $this->getOffset(),
                'type' => $this->collectionType,
                'count' => true
            ];
        }

        if ($this->collectionType === 'case' || $this->collectionType === 'crowdfunding') {
            $dto->inn = null;
        }

        $params = array_merge($dto->toArrayNoGaps(), $defaultParams);

        $this->response = Http::withBasicAuth($this->username, $this->password)->withOptions($this->options)
            ->get($this->baseUri . $this->apiPath, $params);

        $responseJson = $this->response->json();

        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['data'])
                || ! is_array($responseJson['data']) || ! isset($responseJson['status']) || ! isset($responseJson['query'])
                || ! is_array($responseJson['query']) || ! isset($responseJson['alert']) || ! isset($responseJson['total_sum']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service '
                . $this->baseUri . $this->apiPath . ' !', 500);
        }
        $this->responseFailed();

        $this->responseQueryMetadataOffset = $responseJson['query']['offset'] ?? 0;
        $this->responseQueryMetadataCount = $responseJson['query']['count'] ?? 0;

        $responseDataArr = [];
        foreach ($responseJson['data'] as $item) {
            if (isset($item['response_card_type']) && $item['response_card_type'] === $this->collectionType) {
                $responseDataArr[] = $item;
            }
        }

        $responseDataDto = collect($responseDataArr)->map(function ($item) {
            return new $this->responseDataDtoClassName($item);
        });

        $responseDto = new $this->responseDataClassName(
            data: $responseDataDto,
            links: $this->isPagination ? $this->createResponseLinks() : [],
            meta: $this->createResponseMeta()
        );

        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
    }

    private function getOffset(): int
    {
        $page  = $this->page > 1 ? $this->page : 0;
        return $page * $this->limit;
    }

    private function getLastPage(): int
    {
        return $this->responseQueryMetadataCount > $this->limit
            ? ceil($this->responseQueryMetadataCount / $this->limit) : 1;
    }

    private function getUnpaginatedPage(): int
    {
        return max(floor($this->responseQueryMetadataOffset / $this->limit), 1);
    }

    /**
     * @throws UnknownProperties
     */
    private function createResponseMeta(): array
    {
        return (new ResponseMetaDto(
            current_page: $this->isPagination ? $this->page : $this->getUnpaginatedPage(),
            from: $this->responseQueryMetadataOffset > 0 ? $this->responseQueryMetadataOffset + 1 : 1,
            last_page: $this->getLastPage(),
            links: [],
            path: route($this->ourApiMethodRouteName),
            per_page: $this->limit,
            to: $this->responseQueryMetadataOffset > 0 ? $this->responseQueryMetadataOffset + $this->limit : $this->limit,
            total: $this->responseQueryMetadataCount
        ))->toArray();
    }

    /**
     * @throws UnknownProperties
     */
    private function createResponseLinks(): array
    {
        $page = $this->isPagination ? $this->page : $this->getUnpaginatedPage();
        $prev = $page > 1 ? $page - 1 : null;
        $next = $this->getLastPage() > $page ? $page + 1 : null;
        return (new ResponseLinksDto(
            first: route($this->ourApiMethodRouteName) . '?page=1',
            last: route($this->ourApiMethodRouteName) . '?page=' . $this->getLastPage(),
            prev: isset($prev) ? route($this->ourApiMethodRouteName) . '?page=' . $prev : null,
            next: isset($next) ? route($this->ourApiMethodRouteName) . '?page=' . $next : null
        ))->toArray();
    }
}
