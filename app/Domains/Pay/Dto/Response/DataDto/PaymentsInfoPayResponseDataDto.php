<?php

namespace App\Domains\Pay\Dto\Response\DataDto;

use App\Domains\Pay\Dto\Response\Partial\CommissionPayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\CpPayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\CurrencyPayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\ShortCasePayResponseDto;
use App\Domains\Pay\Dto\Response\Partial\SumPayResponseDto;
use App\Parents\Dto\Base\DataTransferObject;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Attributes\MapTo;

/**
 * Class PaymentsInfoPayResponseDataDto
 * @package App\Domains\Pqy\Dto\Response\DataDto
 *
 * @OA\Schema(
 *     title="PaymentsInfoPayResponseDataDto",
 *     description="PaymentsInfoPayResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="object",
 *         ref="#/components/schemas/SumPayResponseDto",
 *     ),
 *     @OA\Property(
 *         property="cp",
 *         type="object",
 *         ref="#/components/schemas/CpPayResponseDto",
 *     ),
 *     @OA\Property(
 *         property="case",
 *         type="object",
 *         ref="#/components/schemas/ShortCasePayResponseDto",
 *     ),
 *     @OA\Property(
 *         property="timestamp",
 *         type="integer",
 *         example="1383248074",
 *     ),
 *     @OA\Property(
 *         property="removed",
 *         type="integer",
 *         example="1383248074",
 *     ),
 * )
 *
 */
class PaymentsInfoPayResponseDataDto extends DataTransferObject
{
    public int $id;
    public SumPayResponseDto $sum;
    public CpPayResponseDto $cp;
    public ShortCasePayResponseDto $case;
    public int $timestamp;
    public int $removed;
}
