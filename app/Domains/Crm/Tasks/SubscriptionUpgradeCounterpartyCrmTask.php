<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\CollectionDto\SubscriptionUpgradeCounterpartyCollectionCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class SubscriptionUpgradeCounterpartyCrmTask extends AbstractResourceCrmTask
{
    protected string $contentArrayName = 'data';
    protected string $httpType = AbstractTask::GET_TYPE;
    protected array $addParams = [
        'uuid' => 'uuid',
        'state' => 'state',
        'counterparty' => 'counterparty',
        'builder' => 'builder',
        'views' => 'views',
        'expired' => 'expired',
    ];
    protected string $responseDtoClassName = SubscriptionUpgradeCounterpartyCollectionCrmResponseDto::class;

    public function __construct(string $uuid)
    {
        parent::__construct();
        $this->apiPath = '/counterparties/signup-upgrade/' . $uuid;
    }
}
