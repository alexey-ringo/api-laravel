<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\CheckAuthRequestDto;
use App\Domains\Auth\Tasks\CheckAuthTask;
use App\Domains\Auth\Validators\CheckAuthValidator;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class CheckAuthAction
{
    /**
     * @var CheckAuthTask
     */
    private CheckAuthTask $checkAuthTask;

    /**
     * CheckAuthAction constructor.
     * @param CheckAuthTask $checkAuthTask
     */
    public function __construct(CheckAuthTask $checkAuthTask)
    {
        $this->checkAuthTask = $checkAuthTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(CheckAuthRequestDto $dto): ResourceResponseDto
    {
        $validator = CheckAuthValidator::create($dto->toArrayNoGaps());
        if (!$validator->fails()) {
            return $this->checkAuthTask->run($dto);
        }
        throw new ValidationException($validator);
    }
}
