<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\FetchUserAuthRequestDto;
use App\Domains\Auth\Dto\Response\FetchUserAuthResourceResponseDto;
use App\Domains\Auth\Tasks\FetchUserAuthTask;
use Illuminate\Validation\ValidationException;

class FetchUserAuthAction
{
    /**
     * @var FetchUserAuthTask
     */
    private FetchUserAuthTask $fetchUserAuthTask;

    /**
     * FetchUserAuthAction constructor.
     * @param FetchUserAuthTask $fetchUserAuthTask
     */
    public function __construct(FetchUserAuthTask $fetchUserAuthTask)
    {
        $this->fetchUserAuthTask = $fetchUserAuthTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(FetchUserAuthRequestDto $requestDto): FetchUserAuthResourceResponseDto
    {
        return $this->fetchUserAuthTask->run($requestDto);
    }
}
