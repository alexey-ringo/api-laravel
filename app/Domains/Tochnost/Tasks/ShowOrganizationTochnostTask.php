<?php

namespace App\Domains\Tochnost\Tasks;

use App\Domains\Tochnost\Dto\Response\ShowOrganizationTochnostResponseCategoriesDto;
use App\Domains\Tochnost\Dto\Response\ShowOrganizationTochnostResponseDto;
use App\Domains\Tochnost\Dto\Response\ShowOrganizationTochnostResponseHelpersDto;
use App\Domains\Tochnost\Dto\Response\ShowOrganizationTochnostResponseProblemsDto;
use App\Domains\Tochnost\Dto\Response\ShowOrganizationTochnostResponseRegionsDto;
use App\Domains\Tochnost\Dto\Response\ShowOrganizationTochnostResponseSitesDto;
use App\Domains\Tochnost\Tasks\Base\AbstractTochnostTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ShowOrganizationTochnostTask extends AbstractTochnostTask
{
    protected string $apiPath = '/service/core/get/';
    protected array $options;
    protected Response $response;

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(int $inn): ResourceResponseDto
    {
        $params = [
            'token' => $this->token
        ];

        $this->response = Http::withOptions($this->options)
            ->get($this->baseUri . $this->apiPath . $inn, $params);

        $responseJson = $this->response->json();

        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['data'])
                || ! isset($responseJson['data']['helpers']) || ! isset($responseJson['data']['categories'])
                || ! isset($responseJson['data']['problems']) || ! isset($responseJson['data']['sites'])
                || ! isset($responseJson['data']['regions']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service '
                . $this->baseUri . $this->apiPath . ' !', 500);
        }
        $this->responseFailed();

        $responseDataArray = $responseJson['data'];

        $responseHelpersCollection = collect($responseDataArray['helpers'])->map(function ($item) {
            return new ShowOrganizationTochnostResponseHelpersDto($item);
        });
        unset($responseDataArray['helpers']);
        $responseDataArray['helpers'] = $responseHelpersCollection->toArray();

        $responseCategoriesCollection = collect($responseDataArray['categories'])->map(function ($item) {
            return new ShowOrganizationTochnostResponseCategoriesDto($item);
        });
        unset($responseDataArray['categories']);
        $responseDataArray['categories'] = $responseCategoriesCollection->toArray();

        $responseProblemsCollection = collect($responseDataArray['problems'])->map(function ($item) {
            return new ShowOrganizationTochnostResponseProblemsDto($item);
        });
        unset($responseDataArray['problems']);
        $responseDataArray['problems'] = $responseProblemsCollection->toArray();

        $responseSitesCollection = collect($responseDataArray['sites'])->map(function ($item) {
            return new ShowOrganizationTochnostResponseSitesDto($item);
        });
        unset($responseDataArray['sites']);
        $responseDataArray['sites'] = $responseSitesCollection->toArray();

        $responseRegionsCollection = collect($responseDataArray['regions'])->map(function ($item) {
            return new ShowOrganizationTochnostResponseRegionsDto($item);
        });
        unset($responseDataArray['regions']);
        $responseDataArray['regions'] = $responseRegionsCollection->toArray();

        $responseDto = new ShowOrganizationTochnostResponseDto($responseDataArray);

        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
    }
}
