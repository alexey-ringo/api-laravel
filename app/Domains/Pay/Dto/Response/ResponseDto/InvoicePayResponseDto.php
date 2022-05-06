<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Domains\Pay\Dto\Response\DataDto\InvoicePayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class InvoicePayResponseDto
 * @package App\Domains\Pqy\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="InvoicePayResponseDto",
 *     description="InvoicePayResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Not found",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="string",
 *         ref="#/components/schemas/InvoicePayResponseDataDto",
 *     ),
 * )
 *
 */
class InvoicePayResponseDto extends DataTransferObject
{
    public string $status;
    public string|null $message;
    public InvoicePayResponseDataDto|null $data;
}
