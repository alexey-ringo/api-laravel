<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SubscriptionSignupDto
 * @package App\Domains\Pay\Dto\Response\Partial
 */
class SubscriptionSignupDto extends DataTransferObject
{
    public bool $active;
    public bool $delete;
}
