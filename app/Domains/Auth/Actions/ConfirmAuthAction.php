<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\ConfirmAuthRequestDto;
use App\Domains\Auth\Tasks\ConfirmAuthTask;
use App\Domains\Auth\Validators\ConfirmAuthValidator;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ConfirmAuthAction
{
    /**
     * @var ConfirmAuthTask
     */
    private ConfirmAuthTask $confirmAuthTask;

    /**
     * ConfirmAuthAction constructor.
     * @param ConfirmAuthTask $confirmAuthTask
     */
    public function __construct(ConfirmAuthTask $confirmAuthTask)
    {
        $this->confirmAuthTask = $confirmAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(ConfirmAuthRequestDto $dto): ResourceResponseDto
    {
        $validator = ConfirmAuthValidator::create($dto->toArrayNoGaps());
        if (!$validator->fails()) {
            return $this->confirmAuthTask->run($dto);
        }
        throw new ValidationException($validator);
    }
}
