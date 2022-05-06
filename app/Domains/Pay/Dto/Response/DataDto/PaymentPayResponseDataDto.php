<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Domains\Pay\Dto\Response\Partial\CommissionPayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\CurrencyPayResponseDto;
use App\Parents\Dto\Base\DataTransferObject;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Attributes\MapTo;

/**
 * Class PaymentPayResponseDataDto
 * @package App\Domains\Pqy\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="PaymentPayResponseDataDto",
 *     description="PaymentPayResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="212223",
 *     ),
 *     @OA\Property(
 *         property="case_name",
 *         type="string",
 *         example="Спортивная площадка для бездомных с инвалидностью",
 *     ),
 *     @OA\Property(
 *         property="case_url",
 *         type="string",
 *         example="https://nuzhnapomosh.ru/funds/sportivnaya-ploshhadka-dlya-bezdomnykh",
 *     ),
 *     @OA\Property(
 *         property="case_id",
 *         type="integer",
 *         example="519",
 *     ),
 *     @OA\Property(
 *         property="date",
 *         type="string",
 *         example="26.08.21",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="error",
 *     ),
 *     @OA\Property(
 *         property="status_title",
 *         type="string",
 *         example="Ошибка перевода",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="string",
 *         example="12.00",
 *     ),
 *     @OA\Property(
 *         property="currency",
 *         type="object",
 *         ref="#/components/schemas/CurrencyPayResponseDto",
 *     ),
 *     @OA\Property(
 *         property="sum_int",
 *         type="integer",
 *         example="12",
 *     ),
 *     @OA\Property(
 *         property="payment_type",
 *         type="string",
 *         example="Банковская карта",
 *     ),
 *     @OA\Property(
 *         property="payment_title",
 *         type="string",
 *         example="Однократное",
 *     ),
 *     @OA\Property(
 *         property="is_recurrent",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="is_paid",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="payments_type",
 *         type="string",
 *         example="TD",
 *     ),
 *     @OA\Property(
 *         property="comission",
 *         type="object",
 *         ref="#/components/schemas/CommissionPayResponseDto",
 *     ),
 *     @OA\Property(
 *         property="foreign",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="foreign_type",
 *         type="string",
 *         example="TD",
 *     ),
 * )
 *
 */
class PaymentPayResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $case_name;
    public string $case_url;
    public int $case_id;
    public string $date;
    public string $status;
    public string $status_title;
    public string $sum;
    public CurrencyPayResponseDto $currency;
    public int $sum_int;
    public string $payment_type;
    public string $payment_title;
    #[MapFrom('is_reccurent')]
    #[MapTo('is_recurrent')]
    public bool $is_recurrent;
    public bool $is_paid;
    public string $payments_type;
//    public array $commission;
    public CommissionPayResponseDto $commission;
    public array $payment;
    public bool $foreign;
    public bool $foreign_type;

    public function __construct(array $data)
    {
//        if (isset($data['is_reccurent'])) {
//            $data['is_recurrent'] = $data['is_reccurent'];
//        }
        if (! isset($data['commission'])) {
            $data['commission'] = new CommissionPayResponseDto(percent: 0, sum: $data['sum'], full_sum: $data['full_sum']);
        }
        if (isset($data['commission']['procent'])) {
            $data['commission']['percent'] = is_string($data['commission']['procent']) ? (int) $data['commission']['procent'] : $data['commission']['procent'];
        }
        parent::__construct($data);
    }
}
