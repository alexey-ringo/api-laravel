<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\ShowUserAuthRequestDto;
use App\Domains\Auth\Tasks\ShowAuthTokenByUserTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ShowAuthTokenByUserAction
{
    /**
     * @var ShowAuthTokenByUserTask
     */
    private ShowAuthTokenByUserTask $showAuthTokenByUserTask;

    /**
     * UserAuthAction constructor.
     * @param ShowAuthTokenByUserTask $showAuthTokenByUserTask
     */
    public function __construct(ShowAuthTokenByUserTask $showAuthTokenByUserTask)
    {
        $this->showAuthTokenByUserTask = $showAuthTokenByUserTask;
    }

    /**
     * @throws ValidationException
     * @throws UnknownProperties
     * @throws ApiLogicalException
     */
    public function run(ShowUserAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->showAuthTokenByUserTask->run($dto);
    }
}
