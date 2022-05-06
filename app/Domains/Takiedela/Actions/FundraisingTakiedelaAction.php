<?php

namespace App\Domains\Takiedela\Actions;

use App\Domains\Takiedela\Tasks\FundraisingTakiedelaTask;
use App\Domains\Takiedela\Dto\Request\PostsTakiedelaRequestDto;
use App\Parents\Dto\Response\ResourceResponseDto;

class FundraisingTakiedelaAction
{
    private FundraisingTakiedelaTask $fundraisingTask;

    public function __construct(FundraisingTakiedelaTask $fundraisingTask)
    {
        $this->fundraisingTask = $fundraisingTask;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(PostsTakiedelaRequestDto $dto): ResourceResponseDto
    {
        return $this->fundraisingTask->run($dto);
    }
}
