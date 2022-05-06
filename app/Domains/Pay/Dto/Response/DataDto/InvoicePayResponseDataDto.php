<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class InvoicePayResponseDataDto
 * @package App\Domains\Pqy\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="InvoicePayResponseDataDto",
 *     description="InvoicePayResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="123321",
 *     ),
 *     @OA\Property(
 *         property="uid",
 *         type="string",
 *         example="d_18931209",
 *     ),
 *     @OA\Property(
 *         property="case_name",
 *         type="string",
 *         example="Такие дела",
 *     ),
 *     @OA\Property(
 *         property="full_sum",
 *         type="string",
 *         example="55.00",
 *     ),
 *     @OA\Property(
 *         property="real_sum",
 *         type="string",
 *         example="55.00",
 *     ),
 *     @OA\Property(
 *         property="currency",
 *         type="string",
 *         example="RUB",
 *     ),
 *     @OA\Property(
 *         property="date_timestamp",
 *         type="string",
 *         example="24.11.2021",
 *     ),
 *     @OA\Property(
 *         property="recurrent",
 *         type="integer",
 *         example="Разовый платеж",
 *     ),
 *     @OA\Property(
 *         property="provider",
 *         type="string",
 *         example="CP",
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="integer",
 *         example="Банковская карта",
 *     ),
 *     @OA\Property(
 *         property="user",
 *         type="string",
 *         example="Алексей Ринго",
 *     ),
 * )
 *
 */
class InvoicePayResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $uid;
    public string $case_name;
    public string $full_sum;
    public string $real_sum;
    public string $currency;
    public string $date_timestamp;
    public string $recurrent;
    public string $provider;
    public string $type;
    public string $user;
}
