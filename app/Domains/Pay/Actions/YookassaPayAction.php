<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\RequestYookassaPayRequestDto;
use App\Domains\Pay\Tasks\YookassaPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class YookassaPayAction
{
    /**
     * @var YookassaPayTask
     */
    private YookassaPayTask $yookassaPayTask;

    /**
     * YookassaPayAction constructor.
     * @param YookassaPayTask $yookassaPayTask
     */
    public function __construct(YookassaPayTask $yookassaPayTask)
    {
        $this->yookassaPayTask = $yookassaPayTask;
    }

    /**
     * @throws ValidationException
     */
    public function run(RequestYookassaPayRequestDto $dto): ResourceResponseDto
    {
        return $this->yookassaPayTask->run($dto);
    }
}
