<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\UserAuthRequestDto;
use App\Domains\Auth\Tasks\UserAuthTask;
use App\Domains\Auth\Validators\UserAuthValidator;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserAuthAction
{
    /**
     * @var UserAuthTask
     */
    private UserAuthTask $userAuthTask;

    /**
     * UserAuthAction constructor.
     * @param UserAuthTask $userAuthTask
     */
    public function __construct(UserAuthTask $userAuthTask)
    {
        $this->userAuthTask = $userAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(UserAuthRequestDto $dto): ResourceResponseDto
    {
        $validator = UserAuthValidator::create($dto->toArrayNoGaps());
        if (!$validator->fails()) {
            return $this->userAuthTask->run($dto);
        }
        throw new ValidationException($validator);
    }
}
