<?php

namespace App\Domains\Pay\Dto\Response\Partial;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class CurrencyPayResponseDto
 * @package App\Domains\Pqy\Dto\Response\Partial
 *
 * @OA\Schema(
 *     title="CurrencyPayResponseDto",
 *     description="CurrencyPayResponseDto",
 *     @OA\Property(
 *         property="symbol",
 *         type="string",
 *         example="P",
 *     ),
 *     @OA\Property(
 *         property="text",
 *         type="string",
 *         example="RUB",
 *     ),
 * )
 *
 */
class CurrencyPayResponseDto extends DataTransferObject
{
    public string $symbol;
    public string $text;
}
