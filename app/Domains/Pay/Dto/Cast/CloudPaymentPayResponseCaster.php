<?php

namespace App\Domains\Pay\Dto\Cast;

use App\Domains\Pay\Dto\Response\DataDto\LinkedCardPayResponseDataDto;
use App\Domains\Pay\Dto\Response\DataDto\PaymentPayResponseDataDto;
use App\Domains\Pay\Dto\Response\DataDto\SubscriptionPayResponseDataDto;
use Spatie\DataTransferObject\Caster;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CloudPaymentPayResponseCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return SubscriptionPayResponseDataDto|LinkedCardPayResponseDataDto|null
     * @throws UnknownProperties
     */
    public function cast(mixed $value): SubscriptionPayResponseDataDto|LinkedCardPayResponseDataDto|null
    {
        if (! isset($value)) {
            return null;
        }
        if (is_array($value) && count($value) === 0) {
//            return $value;
            return null;
        }

//        if (isset($value['is_recurrent']) || isset($value['is_reccurent'])) {
//            return new PaymentPayResponseDataDto($value);
//        } elseif (isset($value['cardnumber']) && isset($value['cardtype'])) {
//            return new LinkedCardPayResponseDataDto($value);
//        } else {
//            return new SubscriptionPayResponseDataDto($value);
//        }
        if (isset($value['cardnumber']) && isset($value['cardtype'])) {
            return new LinkedCardPayResponseDataDto($value);
        } else {
            return new SubscriptionPayResponseDataDto($value);
        }
    }
}
