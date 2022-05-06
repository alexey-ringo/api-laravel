<?php

namespace App\Domains\Pay\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class RequestYookassaPayResponseDto
 * @package App\Domains\Pqy\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="YookassaResponseDto",
 *     description="Yookassa Response",
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="Success",
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         example="https://yoomoney.ru/payments/external/fail?orderId=28356cc4-000f-5000-9000-10ed7ee3ca73&reason=technical",
 *     )
 * )
 *
 */
class RequestYookassaPayResponseDto extends DataTransferObject
{
    public string $status;
    public string $message;
    public array $data;
    public array|null $extra_data;

    public function __construct(array $data)
    {
        $data['data'] = $data['data'] ?? [];
        parent::__construct($data);
    }
}
