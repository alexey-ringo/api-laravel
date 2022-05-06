<?php

namespace App\Domains\Comments\Tasks\Base;

use App\Domains\Comments\Dto\Base\BaseCommentsRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use App\Parents\Tasks\AbstractTask;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class AbstractCommentsTask extends AbstractTask
{
    protected string $baseUri;

    /**
     * AbstractAuthTask constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    /**
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function run(BaseCommentsRequestDto $dto): ResourceResponseDto
    {
        $this->sendHttp($dto);
        $this->responseValidationData();
        $this->fillResponseDto();

        return new ResourceResponseDto(responseDto: $this->responseResourceDto, statusCode: $this->response->status());
    }

    private function initialize()
    {
        $this->baseUri = match (app()->environment()) {
            'staging' => config('domains.comments.staging.base_uri'),
            'local' => config('domains.comments.staging.base_uri'),
            default => config('domains.comments.production.base_uri'),
        };
    }
}
