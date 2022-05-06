<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\UpdateMetaDataSettingAuthRequestDto;
use App\Domains\Auth\Tasks\UpdateMetaDataSettingAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class UpdateMetaDataSettingAuthAction
{
    private UpdateMetaDataSettingAuthTask $updateMetaDataSettingAuthTask;

    public function __construct(UpdateMetaDataSettingAuthTask $updateMetaDataSettingAuthTask)
    {
        $this->updateMetaDataSettingAuthTask = $updateMetaDataSettingAuthTask;
    }

    public function run(UpdateMetaDataSettingAuthRequestDto $dto): ResourceResponseDto
    {
        return $this->updateMetaDataSettingAuthTask->run($dto);
    }
}
