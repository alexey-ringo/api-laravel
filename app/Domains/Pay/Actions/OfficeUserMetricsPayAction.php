<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Pay\Dto\Request\OfficeUserMetricsPayRequestDto;
use App\Domains\Pay\Tasks\UserMetricsDonationPayTask;
use App\Domains\Pay\Tasks\UserMetricsEventPayTask;
use App\Domains\Pay\Tasks\UserMetricsMatchingPayTask;
use App\Exceptions\ApiLogicalException;
use App\Parents\Dto\Response\ResourceResponseDto;

class OfficeUserMetricsPayAction
{
    const ONCE_TRUE = 'once_true';
    const ONCE_FALSE = 'once_false';
    const RECURRENT = 'recurrent';
    const EVENTS = 'events';
    const MATCHING = 'matching';

    private UserMetricsDonationPayTask $userMetricsDonationPayTask;
    private UserMetricsEventPayTask $userMetricsEventPayTask;
    private UserMetricsMatchingPayTask $userMetricsMatchingPayTask;

    public function __construct(
        UserMetricsDonationPayTask       $userMetricsDonationPayTask,
        UserMetricsEventPayTask          $userMetricsEventPayTask,
        UserMetricsMatchingPayTask $userMetricsMatchingPayTask
    ) {
        $this->userMetricsDonationPayTask = $userMetricsDonationPayTask;
        $this->userMetricsEventPayTask = $userMetricsEventPayTask;
        $this->userMetricsMatchingPayTask = $userMetricsMatchingPayTask;
    }

    public function run(OfficeUserMetricsPayRequestDto $dto): ResourceResponseDto
    {
        if ($dto->type === self::ONCE_TRUE || $dto->type === self::ONCE_FALSE || $dto->type === self::RECURRENT) {
            return $this->userMetricsDonationPayTask->run($dto);
        }
        if ($dto->type === self::EVENTS) {
            return $this->userMetricsEventPayTask->run($dto);
        }
        if ($dto->type === self::MATCHING) {
            return $this->userMetricsMatchingPayTask->run($dto);
        }

        throw new ApiLogicalException(__CLASS__ . __METHOD__ . ' - invalid type!', 422);
    }
}
