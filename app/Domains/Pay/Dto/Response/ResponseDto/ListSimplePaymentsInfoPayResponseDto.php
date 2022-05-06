<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;
use Spatie\DataTransferObject\Attributes\MapFrom;

/**
 * Class ListSimplePaymentsInfoPayResponseDto
 * @package App\Domains\Pqy\Dto\Response\ResponseDto
 *
 */
class ListSimplePaymentsInfoPayResponseDto extends DataTransferObject
{
    #[MapFrom('result')]
    public array $data;
}
