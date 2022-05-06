<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\RecoveryAuthRequestDto;
use App\Domains\Auth\Tasks\RecoveryAuthTask;
use App\Domains\Auth\Validators\RecoveryAuthValidator;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RecoveryAuthAction
{
    /**
     * @var RecoveryAuthTask
     */
    private RecoveryAuthTask $recoveryAuthTask;

    /**
     * LogoutAuthAction constructor.
     * @param RecoveryAuthTask $recoveryAuthTask
     */
    public function __construct(RecoveryAuthTask $recoveryAuthTask)
    {
        $this->recoveryAuthTask = $recoveryAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(RecoveryAuthRequestDto $dto): ResourceResponseDto
    {
        $validator = RecoveryAuthValidator::create($dto->toArrayNoGaps());
        if (!$validator->fails()) {
            return $this->recoveryAuthTask->run($dto);
        }
        throw new ValidationException($validator);
    }
}
