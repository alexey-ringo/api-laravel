<?php

namespace App\Domains\Tochnost\Tasks;

use App\Domains\Tochnost\Dto\CountOrganizationsTochnostResponseDto;
use App\Domains\Tochnost\Tasks\Base\AbstractTochnostTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CountOrganizationsTochnostTask extends AbstractTochnostTask
{
    protected string $apiPath = '/service/core/counter';
    protected array $options;
    protected Response $response;

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(): ResourceResponseDto
    {
        $params = [
            'token' => $this->token
        ];

        $this->response = Http::withOptions($this->options)
            ->get($this->baseUri . $this->apiPath, $params);

        $responseJson = $this->response->json();

        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['data']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service!', 500);
        }
        $this->responseFailed();

        $responseDto = new CountOrganizationsTochnostResponseDto($responseJson['data']);

        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
    }
}
