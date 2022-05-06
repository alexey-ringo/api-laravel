<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\UpdateSubscriptionUpgradeCounterpartyCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class UpdateSubscriptionUpgradeCounterpartyCrmTask extends AbstractResourceCrmTask
{
    protected string $extractFromContentName = 'data';
    protected string $httpType = AbstractTask::POST_TYPE;
//    protected array $addParams = [
//        'uuid' => 'uuid',
//        'state' => 'state',
//        'counterparty' => 'counterparty',
//        'builder' => 'builder',
//        'views' => 'views',
//        'expired' => 'expired',
//    ];
    protected string $responseDtoClassName = UpdateSubscriptionUpgradeCounterpartyCrmResponseDto::class;

    public function __construct(string $uuid)
    {
        parent::__construct();
        $this->apiPath = '/counterparties/signup-upgrade/' . $uuid;
    }
}
