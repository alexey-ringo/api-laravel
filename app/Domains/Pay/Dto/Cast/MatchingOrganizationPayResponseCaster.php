<?php

namespace App\Domains\Pay\Dto\Cast;

use App\Domains\Pay\Dto\Response\DataDto\MatchingOrganizationPayResponseDataDto;
use Spatie\DataTransferObject\Caster;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class MatchingOrganizationPayResponseCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return MatchingOrganizationPayResponseDataDto|null
     * @throws UnknownProperties
     */
    public function cast(mixed $value): MatchingOrganizationPayResponseDataDto|null
    {
        if (! isset($value)) {
            return null;
        }

        if (! isset($value['bank_name'])) {
            $value['bank_name'] = '';
        }

        return new MatchingOrganizationPayResponseDataDto($value);
    }
}
