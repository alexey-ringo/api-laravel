<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Domains\Pay\Dto\Response\Partial\CasePayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\CommissionPayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\CurrencyPayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\SubscriptionPaymentDto;
use App\Domains\Pay\Dto\Response\Partial\SubscriptionSignupDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SubscriptionPayResponseDataDto
 * @package App\Domains\Pay\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="SubscriptionPayResponseDataDto",
 *     description="SubscriptionPayResponseDataDto",
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
 *     @OA\Property(
 *         property="matching",
 *         type="boolean",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="donations",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class SubscriptionPayResponseDataDto extends DataTransferObject
{
    public int $id;
//    public array $case;
    public CasePayResponseDto $case;
    public int $master_id;
    public string $sum;
    public CurrencyPayResponseDto $currency;
    public string $provider;
    public string $start_date;
    public string $payment_date;
    public string $payment_sum;
    public string $full_sum;
    public int $payday = 1;
    public array|null $data;
    public SubscriptionSignupDto $signup;
//    public array $signup;
    public CommissionPayResponseDto $commission;
//    public array $commission;
    public bool $change;
    public SubscriptionPaymentDto $payment;
//    public array $payment;
    public bool $foreign;
    public string $foreign_type;
    public bool $matching;
    public array $donations;

    public function __construct(array $data)
    {
        if (!isset($data['currency'])) {
            $data['currency'] = [
                'symbol' => '₽',
                'text' => 'RUB'
            ];
        }
        if (! isset($data['commission'])) {
            $data['commission'] = new CommissionPayResponseDto(percent: 0, sum: $data['sum'], full_sum: $data['full_sum']);
        }
        if (isset($data['commission']['procent'])) {
            $data['commission']['percent'] = is_string($data['commission']['procent']) ? (int) $data['commission']['procent'] : $data['commission']['procent'];
        }
        parent::__construct($data);
    }
}
