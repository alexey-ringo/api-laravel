<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Domains\Pay\Dto\Response\DataDto\GiftCardPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class ActivateGiftCardPayResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="ActivateGiftCardPayResponseDto",
 *     description="ActivateGiftCardPayResponseDto",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="Карта успешно активированна",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/GiftCardPayResponseDataDto",
 *     ),
 * )
 *
 */
class ActivateGiftCardPayResponseDto extends DataTransferObject
{
    public string $status;
    public string $message;
    public GiftCardPayResponseDataDto|null $data;
}
