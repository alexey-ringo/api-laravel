<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Domains\Pay\Dto\Cast\YookassaPayResponseCaster;
use App\Domains\Pay\Dto\Response\DataDto\SubscriptionPayResponseDataDto;
use App\Parents\Dto\Base\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

/**
 * Class YookassaPayResponseDto
 * @package App\Domains\Pay\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="YookassaPayResponseDto",
 *     description="YookassaPayResponseDto",
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
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         ref="#/components/schemas/SubscriptionPayResponseDataDto",
 *     ),
 * )
 *
 */
class YookassaPayResponseDto extends DataTransferObject
{
    public string $status;
    public string $message;
    #[CastWith(YookassaPayResponseCaster::class)]
    public SubscriptionPayResponseDataDto|null $data;
}
