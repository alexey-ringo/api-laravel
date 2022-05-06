<?php

namespace App\Domains\Auth\Actions;

use App\Domains\Auth\Dto\Request\UpdateAllSettingRequestDto;
use App\Domains\Auth\Tasks\UpdateAllSettingAuthTask;
use App\Parents\Dto\Response\ResourceResponseDto;

class UpdateAllSettingAuthAction
{
    private UpdateAllSettingAuthTask $updateAllSettingsAuthTask;

    public function __construct(UpdateAllSettingAuthTask $updateAllSettingsAuthTask)
    {
        $this->updateAllSettingsAuthTask = $updateAllSettingsAuthTask;
    }

    public function run(UpdateAllSettingRequestDto $dto): ResourceResponseDto
    {
        return $this->updateAllSettingsAuthTask->run($dto);
    }
}
