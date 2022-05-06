<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\FetchOrRegAuthRequestDto;
use App\Domains\Auth\Tasks\FetchOrRegAuthTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FetchOrRegAuthAction
{
    /**
     * @var FetchOrRegAuthTask
     */
    private FetchOrRegAuthTask $fetchOrRegAuthTask;

    /**
     * FetchOrRegAuthAction constructor.
     * @param FetchOrRegAuthTask $fetchOrRegAuthTask
     */
    public function __construct(FetchOrRegAuthTask $fetchOrRegAuthTask)
    {
        $this->fetchOrRegAuthTask = $fetchOrRegAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(FetchOrRegAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->fetchOrRegAuthTask->run($dto);
    }
}
