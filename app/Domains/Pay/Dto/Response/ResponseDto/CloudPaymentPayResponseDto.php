<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Domains\Pay\Dto\Cast\CloudPaymentPayResponseCaster;
use App\Domains\Pay\Dto\Response\DataDto\LinkedCardPayResponseDataDto;
use App\Domains\Pay\Dto\Response\DataDto\PaymentPayResponseDataDto;
use App\Domains\Pay\Dto\Response\DataDto\SubscriptionPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class CloudPaymentPayResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="CloudPaymentPayResponseDto",
 *     description="Cloud Payment Response",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="New transaction 1234",
 *     ),
 * )
 *
 */
class CloudPaymentPayResponseDto extends DataTransferObject
{
    public string $status;
    public string $message;
    public int|null $code;
    public string|null $PaReq;
    public int|null $MD;
    public string|null $TermUrl;
    public string|null $AcsUrl;
    #[CastWith(CloudPaymentPayResponseCaster::class)]
//    public SubscriptionPayResponseDataDto|PaymentPayResponseDataDto|LinkedCardPayResponseDataDto|null $data;
    public SubscriptionPayResponseDataDto|LinkedCardPayResponseDataDto|null $data;
    public array|null $extra_data;

//    /**
//     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
//     */
//    public function __construct(array $data)
//    {
//        $data['data'] = $data['data'] ?? [];
//        parent::__construct($data);
//    }
}
