<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\CheckAuthRequestDto;
use App\Domains\Auth\Tasks\LoginAuthTask;
use App\Domains\Auth\Validators\CheckAuthValidator;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class LoginAuthAction
{
    /**
     * @var LoginAuthTask
     */
    private LoginAuthTask $loginAuthTask;

    /**
     * LoginAuthAction constructor.
     * @param LoginAuthTask $loginAuthTask
     */
    public function __construct(LoginAuthTask $loginAuthTask)
    {
        $this->loginAuthTask = $loginAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(CheckAuthRequestDto $dto): ResourceResponseDto
    {
        $validator = CheckAuthValidator::create($dto->toArrayNoGaps());
        if (!$validator->fails()) {
            return $this->loginAuthTask->run($dto);
        }
        throw new ValidationException($validator);
    }
}
