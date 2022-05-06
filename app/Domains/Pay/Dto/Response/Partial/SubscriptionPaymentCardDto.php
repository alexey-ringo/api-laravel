<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SubscriptionPaymentCardDto
 * @package App\Domains\Pay\Dto\Response\Partial
 */
class SubscriptionPaymentCardDto extends DataTransferObject
{
    public int|null $id;
    public string $type;
    public string $title;
    public string $number;
    public string $time;
}
