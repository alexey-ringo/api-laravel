<?php

namespace App\Domains\Auth\Tasks;

use App\Domains\Auth\Dto\FetchUserAuthRequestDto;
use App\Domains\Auth\Dto\Response\FetchUserAuthResponseDto;
use App\Domains\Auth\Dto\Response\FetchUserAuthResourceResponseDto;
use App\Domains\Auth\Tasks\Base\AbstractAuthTask;
use App\Exceptions\ApiLogicalException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FetchUserAuthTask extends AbstractAuthTask
{
    protected string $apiPath = '/api/v1/fetch';
    protected array $options;
    protected Response $response;

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function run(FetchUserAuthRequestDto $dto): FetchUserAuthResourceResponseDto
    {
        $this->response = Http::withToken($dto->token)->withOptions($this->options)
            ->get($this->baseUri . $this->apiPath);

        $responseJson = $this->response->json();

        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['user']) || ! is_array($responseJson['user']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service '
                . $this->baseUri . $this->apiPath . ' !', 500);
        }
        $this->responseFailed();

        if (! isset($responseJson['user']['message'])) {
            $responseJson['user']['message'] = '';
        }

        $responseDto = new FetchUserAuthResponseDto($responseJson['user']);

        return new FetchUserAuthResourceResponseDto(fetchUserResponseDto: $responseDto, statusCode: $this->response->status());
    }
}
