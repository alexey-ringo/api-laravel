<?php

namespace App\Domains\Tochnost\Tasks;

use App\Domains\Tochnost\Dto\Request\SearchOrganizationsTochnostRequestDto;
use App\Domains\Tochnost\Dto\Response\SearchOrganizationsBotTochnostResponseDataDto;
use App\Domains\Tochnost\Dto\Response\SearchOrganizationsTochnostResponseDataDto;
use App\Domains\Tochnost\Dto\Response\SearchOrganizationsTochnostResponseDto;
use App\Domains\Tochnost\Dto\Response\SearchOrganizationsTochnostResponseLinksDto;
use App\Domains\Tochnost\Dto\Response\SearchOrganizationsTochnostResponseMetaDto;
use App\Domains\Tochnost\Tasks\Base\AbstractCollectionDataMetaTochnostTask;
use App\Domains\Tochnost\Tasks\Base\AbstractTochnostTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SearchOrganizationsBotTochnostTask extends AbstractCollectionDataMetaTochnostTask
{
    protected string $apiPath = '/service/organizations/search';
    protected string $responseDataDtoClassName = SearchOrganizationsBotTochnostResponseDataDto::class;
//    protected array $options;
//    protected Response $response;
//
//    /**
//     * @throws UnknownProperties
//     * @throws ApiLogicalException
//     * @throws ValidationException
//     */
//    public function run(SearchOrganizationsTochnostRequestDto $dto): ResourceResponseDto
//    {
//        $defaultParams = [
//            'token' => $this->token
//        ];
//
//        $params = array_merge($dto->toArrayNoGaps(), $defaultParams);
//
//        $this->response = Http::withOptions($this->options)
//            ->get($this->baseUri . $this->apiPath, $params);
//
//        $responseJson = $this->response->json();
//
//        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['data']))) {
//            throw new ApiLogicalException('Missing or incorrect response format from remote service!', 500);
//        }
//        $this->responseFailed();
//
//        $responseDataDto = collect($responseJson['data'])->map(function ($item) {
//            return new SearchOrganizationsBotTochnostResponseDataDto($item);
//        });
//
//        $responseDto = new SearchOrganizationsTochnostResponseDto(
//            data: $responseDataDto,
//            links: null,
//            meta: null
//        );
//
//        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
//    }
}
