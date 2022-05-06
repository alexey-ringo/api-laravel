<?php

namespace App\Domains\Shop\Tasks;

use App\Domains\Shop\Dto\Request\IndexOrderShopRequestDto;
use App\Domains\Shop\Dto\Response\IndexOrderShopResourceCollectionDto;
use App\Domains\Shop\Dto\Response\IndexOrderShopResponseDto;
use App\Domains\Shop\Dto\Response\IndexOrderShopResponseProductDto;
use App\Domains\Shop\Tasks\Base\AbstractShopTask;
use App\Exceptions\ApiLogicalException;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class IndexOrderShopTask extends AbstractShopTask
{
    protected string $apiPath = '/index.php';
    protected int $id = 0;

    public function __construct(int $id)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(IndexOrderShopRequestDto $dto): IndexOrderShopResourceCollectionDto
    {
        $defaultParams = [
            'id' => $this->id,
            'route' => 'api/order/orders',
            'api_id' => '32ie9dshg5l3543'
        ];

        $params = array_merge($dto->toArrayNoGaps(), $defaultParams);

        $this->response = Http::withOptions($this->options)
            ->get($this->baseUri . $this->apiPath, $params);

        $responseJson = $this->response->json();

        if ($this->response->successful() && (!isset($responseJson) || !isset($responseJson['data']) || !is_array($responseJson['data'])
                || !isset($responseJson['count']) || !isset($responseJson['success']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service '
                . $this->baseUri . $this->apiPath . ' !', 500);
        }
        $this->responseFailed();

        $responseCollection = collect($responseJson['data'])->map(function ($item) {

            $item['products'] = collect($item['products'])->map(function ($productsItem) {
                return new IndexOrderShopResponseProductDto($productsItem);
            });

            return new IndexOrderShopResponseDto($item);
        });

        return new IndexOrderShopResourceCollectionDto(collectionDto: $responseCollection, count: $responseJson['count'], success: $responseJson['success'], statusCode: $this->response->status());
    }
}
