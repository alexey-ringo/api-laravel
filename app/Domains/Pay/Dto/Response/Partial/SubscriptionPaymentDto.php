<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SubscriptionPaymentDto
 * @package App\Domains\Pay\Dto\Response\Partial
 */
class SubscriptionPaymentDto extends DataTransferObject
{
    public string $status;
    public string $name;
    public SubscriptionPaymentCardDto $card;
    public string $type;
}
