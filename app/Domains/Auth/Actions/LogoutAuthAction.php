<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\LogoutAuthRequestDto;
use App\Domains\Auth\Tasks\LogoutAuthTask;
use App\Domains\Auth\Validators\LogoutAuthValidator;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class LogoutAuthAction
{
    /**
     * @var LogoutAuthTask
     */
    private LogoutAuthTask $logoutAuthTask;

    /**
     * LogoutAuthAction constructor.
     * @param LogoutAuthTask $logoutAuthTask
     */
    public function __construct(LogoutAuthTask $logoutAuthTask)
    {
        $this->logoutAuthTask = $logoutAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(LogoutAuthRequestDto $dto): ResourceResponseDto
    {
        $validator = LogoutAuthValidator::create($dto->toArrayNoGaps());
        if (!$validator->fails()) {
            return $this->logoutAuthTask->run($dto);
        }
        throw new ValidationException($validator);
    }
}
