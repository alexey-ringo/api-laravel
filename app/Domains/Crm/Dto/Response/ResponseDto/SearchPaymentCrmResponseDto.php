<?php

namespace App\Domains\Crm\Dto\Response\ResponseDto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class SearchPaymentCrmResponseDto
 * @package App\Domains\Crm\Dto\Response\ResponseDto
 *
 * @OA\Schema(
 *     title="SearchPaymentCrmResponseDto",
 *     description="SearchPaymentCrmResponseDto",
 *     @OA\Property(
 *         property="array",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="filters",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class SearchPaymentCrmResponseDto extends DataTransferObject
{
//    public SearchPaymentCrmResponseDataDto $data;
    public array $data;
    public array $filters;
}
