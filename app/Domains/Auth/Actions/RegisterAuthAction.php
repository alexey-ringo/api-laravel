<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\RegisterAuthRequestDto;
use App\Domains\Auth\Tasks\RegisterAuthTask;
use App\Domains\Auth\Validators\RegisterAuthValidator;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterAuthAction
{
    /**
     * @var RegisterAuthTask
     */
    private RegisterAuthTask $registerAuthTask;

    /**
     * LogoutAuthAction constructor.
     * @param RegisterAuthTask $registerAuthTask
     */
    public function __construct(RegisterAuthTask $registerAuthTask)
    {
        $this->registerAuthTask = $registerAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(RegisterAuthRequestDto $dto): ResourceResponseDto
    {
        $validator = RegisterAuthValidator::create($dto->toArrayNoGaps());
        if (!$validator->fails()) {
            return $this->registerAuthTask->run($dto);
        }
        throw new ValidationException($validator);
    }
}
