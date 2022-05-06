<?php

namespace App\Domains\Pay\Dto\Cast;

use App\Domains\Pay\Dto\Response\DataDto\SubscriptionPayResponseDataDto;
use Spatie\DataTransferObject\Caster;

class YookassaPayResponseCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return SubscriptionPayResponseDataDto|null
     */
    public function cast(mixed $value): SubscriptionPayResponseDataDto|null
    {
        if (! isset($value)) {
            return null;
        }

        return new SubscriptionPayResponseDataDto($value);
    }
}
