<?php

namespace App\Domains\Auth\Tasks\Base;

use App\Domains\Auth\Dto\Request\Base\BaseAuthRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractDataAuthTask
{
    const CONNECTION_TIMEOUT = 10;
    const TIMEOUT = 10;

    protected string $apiPath = '';
    protected string $responseDtoClassName = '';
    protected string $responseDataDtoClassName = '';

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseAuthRequestDto $dto): ResourceResponseDto
    {
        $baseUri = match (app()->environment()) {
            'staging' => config('domains.auth.staging.base_uri'),
            'local' => config('domains.auth.local.base_uri'),
            default => config('domains.auth.production.base_uri'),
        };
        $username = match (app()->environment()) {
            'staging' => config('domains.auth.staging.base_auth_username'),
            'local' => config('domains.auth.local.base_auth_username'),
            default => config('domains.auth.production.base_auth_username'),
        };
        $password = match (app()->environment()) {
            'staging' => config('domains.auth.staging.base_auth_password'),
            'local' => config('domains.auth.local.base_auth_password'),
            default => config('domains.auth.production.base_auth_password'),
        };

        $options = [
            'connect_timeout' => self::CONNECTION_TIMEOUT,
            'timeout'         => self::TIMEOUT,
            'verify' => !app()->environment('local')
        ];

        $response = Http::withBasicAuth($username, $password)
            ->withOptions($options)
            ->post($baseUri . $this->apiPath, $dto->toArrayNoGaps());

        $responseJson = $response->json();

        if ($response->successful() && (! isset($responseJson) || ! isset($responseJson['data'])
                || ! is_array($responseJson['data']) || ! isset($responseJson['status']))) {
            throw new ApiLogicalException('Missing or incorrect response format from remote service '
                . $baseUri . $this->apiPath . ' !', 500);
        }

        if ($response->failed() && !isset($responseJson['status'])) {
            if (isset($responseJson['errors'])) {
                $errorsBag = is_array($responseJson['errors']) ? $responseJson['errors'] : ['Remote service validation error!'];
                throw ValidationException::withMessages($errorsBag);
            } else {
                $errorMsg = $responseJson['message'] ?? 'Remote service error!';
                throw new ApiLogicalException($errorMsg, $response->status());
            }
        }

        $data['status'] = $responseJson['status'];
        $data['data'] = (isset($responseJson['data']) && ! empty($responseJson['data']))
            ? (new $this->responseDataDtoClassName($responseJson['data']))->toArray() : [];
        $data['message'] = $responseJson['message'] ?? '';
        $responseDto = new $this->responseDtoClassName($data);

        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $response->status());
    }
}
