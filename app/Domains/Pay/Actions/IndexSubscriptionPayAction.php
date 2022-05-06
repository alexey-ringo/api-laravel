<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\IndexSubscriptionPayRequestDto;
use App\Domains\Pay\Tasks\IndexSubscriptionPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class IndexSubscriptionPayAction
{
    /**
     * @var IndexSubscriptionPayTask
     */
    private IndexSubscriptionPayTask $officeIndexSignupPayTask;

    /**
     * OfficeIndexSubscriptionPayAction constructor.
     * @param IndexSubscriptionPayTask $officeIndexSignupPayTask
     */
    public function __construct(IndexSubscriptionPayTask $officeIndexSignupPayTask)
    {
        $this->officeIndexSignupPayTask = $officeIndexSignupPayTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(IndexSubscriptionPayRequestDto $dto): ResourceResponseDto
    {
        return $this->officeIndexSignupPayTask->run($dto);
    }
}
